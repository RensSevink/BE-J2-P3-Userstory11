<?php

class Rijscholen extends Controller
{

  private $rijschoolModel;

  public function __construct()
  {
    $this->rijschoolModel = $this->model('Rijschool');
  }

  public function index()
  {
    $instructeurs = $this->rijschoolModel->getInstructeurs();

    $rows = "";
    foreach ($instructeurs as $instructeur) {
      $rows .= "<tr>";
      $rows .= "<td>" . $instructeur->Voornaam . "</td>";
      $rows .= "<td>" . $instructeur->Tussenvoegsel . "</td>";
      $rows .= "<td>" . $instructeur->Achternaam . "</td>";
      $rows .= "<td>" . $instructeur->Mobiel . "</td>";
      $rows .= "<td>" . $instructeur->DatumInDienst . "</td>";
      $rows .= "<td>" . $instructeur->AantalSterren . "</td>";
      $rows .= "<td><a href='" . URLROOT . "/rijscholen/detail/$instructeur->Id'><img src='" . URLROOT . "/img/b_help.png' alt='topic'></a></td>";
      $rows .= "</tr>";
    }

    $data = [
      'title' => 'Rijscholen',
      'instructeurNaam' => $this->rijschoolModel->getInstructeurs(),
      'rows' => $rows,
      'aantalInstructeurs' => count($instructeurs)
    ];

    $this->view('rijschool/index', $data);
  }

  public function detail($id)
  {
    $instructeur = $this->rijschoolModel->getInstructeurById($id);
    $voertuigen = $this->rijschoolModel->getVehiclesByInstructeurId($id);

    $rows = "";
    if (empty($voertuigen)) {
      $rows = "Op dit moment heeft de instrecteur geen voertuigen in gebruik.";
    } else {
      foreach ($voertuigen as $voertuig) {
        $rows .= "<tr>";
        $rows .= "<td>" . $voertuig->TypeVoertuig . "</td>";
        $rows .= "<td>" . $voertuig->Type . "</td>";
        $rows .= "<td>" . $voertuig->Kenteken . "</td>";
        $rows .= "<td>" . $voertuig->Bouwjaar . "</td>";
        $rows .= "<td>" . $voertuig->Brandstof . "</td>";
        $rows .= "<td>" . $voertuig->Rijbewijscategorie . "</td>";
        $rows .= "<tr>";
      }
    }

    $data = [
      'title' => 'Door instructeur gebruikte voertuigen',
      'voornaam' => $instructeur->Voornaam,
      'tussenvoegsel' => $instructeur->Tussenvoegsel,
      'achternaam' => $instructeur->Achternaam,
      'datumindienst' => $instructeur->DatumInDienst,
      'aantalsterren' => $instructeur->AantalSterren,
      'instructeurId' => $instructeur->Id,
      'rows' => $rows
    ];

    $this->view('rijschool/detail', $data);
  }

  public function addVoertuig($instructeurId, $voertuigId = null) {

    if (isset($voertuigId)) {
      $this->rijschoolModel->addVoertuigInstructeur($instructeurId, $voertuigId);
      header("Location: " . URLROOT . "/rijscholen/detail/$instructeurId");
      exit;
    }


    $instructeur = $this->rijschoolModel->getInstructeurById($instructeurId);
    $voertuigen = $this->rijschoolModel->getVoertuigById($instructeurId);

    $rows = "";
    foreach ($voertuigen as $voertuig) {
      $rows .= "<tr>";
      $rows .= "<td>" . $voertuig->TypeVoertuig . "</td>";
      $rows .= "<td>" . $voertuig->Type . "</td>";
      $rows .= "<td>" . $voertuig->Kenteken . "</td>";
      $rows .= "<td>" . $voertuig->Bouwjaar . "</td>";
      $rows .= "<td>" . $voertuig->Brandstof . "</td>";
      $rows .= "<td>" . $voertuig->Rijbewijscategorie . "</td>";
      $rows .= "<td><a href='" . URLROOT . "/rijscholen/addVoertuig/$instructeurId/$voertuig->Id'><img src='" . URLROOT . "/img/b_index.png' alt='topic'></a></td>";
      $rows .= "<tr>";
    }

    $data = [
      'title' => 'Alle beschikbare voertuigen',
      'voornaam' => $instructeur->Voornaam,
      'tussenvoegsel' => $instructeur->Tussenvoegsel,
      'achternaam' => $instructeur->Achternaam,
      'datumindienst' => $instructeur->DatumInDienst,
      'aantalsterren' => $instructeur->AantalSterren,
      'rows' => $rows
    ];

    $this->view('rijschool/addVoertuig', $data);
  }

  public function addVoertuigInstructeur($instructeurId, $voertuigId)
  {
    $this->rijschoolModel->addVoertuigInstructeur($instructeurId, $voertuigId);
  }

}