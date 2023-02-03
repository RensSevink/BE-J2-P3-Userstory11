<?php

class Rijschool
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function getInstructeurs()
  {
   
      $this->db->query("Select * from Instructeur order by AantalSterren desc");
      $result = $this->db->resultSet();
      return $result;
  }

  public function getInstructeurById($id)
  {
    $this->db->query("Select * from Instructeur Where Id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function getVehiclesByInstructeurId($id)
  {
    $this->db->query("Select * 
                      From VoertuigInstructeur 
                      Inner join Voertuig
                      on VoertuigInstructeur.VoertuigId = Voertuig.Id
                      Inner join Instructeur
                      on VoertuigInstructeur.InstructeurId = Instructeur.Id
                      Inner join TypeVoertuig
                      on voertuig.TypeVoertuigId = TypeVoertuig.Id
                      Where VoertuigInstructeur.InstructeurId = :id
                      Order by TypeVoertuig.Rijbewijscategorie asc");

    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }

  public function getVoertuigById($id)
  {
    $this->db->query("Select Voertuig.Id, Voertuig.Kenteken, Voertuig.Bouwjaar, Voertuig.Brandstof, TypeVoertuig.TypeVoertuig, Voertuig.Type, TypeVoertuig.Rijbewijscategorie
                      From Voertuig
                      Inner join TypeVoertuig
                      on Voertuig.TypeVoertuigId = TypeVoertuig.Id
                      Where Voertuig.Id not in (select VoertuigInstructeur.VoertuigId from VoertuigInstructeur where VoertuigInstructeur.InstructeurId = :id)");

    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }

  public function addVoertuigInstructeur($instructeurId, $voertuigId)
  {
    $this->db->query("Insert into VoertuigInstructeur (InstructeurId, VoertuigId) values (:InstructeurId, :VoertuigId)");
    $this->db->bind(':InstructeurId', $instructeurId);
    $this->db->bind(':VoertuigId', $voertuigId);
    return $this->db->execute();
  }

}