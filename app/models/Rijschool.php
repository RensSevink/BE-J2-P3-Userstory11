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
    try {
      $this->db->query("Select * from Instructeur order by AantalSterren desc");
      $result = $this->db->resultSet();
      return $result ?? [];
    } catch (PDOException $ex) {
      $ex->getMessage();
    }
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
                      Where VoertuigInstructeur.InstructeurId = :id");

    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }
}