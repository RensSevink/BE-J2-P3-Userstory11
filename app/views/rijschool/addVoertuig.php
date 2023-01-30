<?php require(APPROOT . '/views/includes/header.php'); ?>


<h3><?= $data['title'] ?></h3>

<table border='1'>
  <thead>
    <th>Type voertuig</th>
    <th>Type</th>
    <th>Kenteken</th>
    <th>Bouwjaar</th>
    <th>Brandstof</th>
    <th>Rijbewijscategorie</th>
    <th>Toevoegen</th>
  </thead>
  <tbody>
    <?= $data['rows'] ?>
  </tbody>
</table>

<?php require(APPROOT . '/views/includes/header.php'); ?>