<?php require(APPROOT . '/views/includes/header.php') ?>
<h3><?= $data['title'] ?></h3>

<h4>TH-78-KL Ferrari</h4>
<form action="<?= URLROOT ?>/mankementen/addMankement" method="post">
    <label for="mankement">Mankementen</label><br>
    <input type="text" name="mankement" id="mankement"><br>
    <br>
    <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '/views/includes/footer.php') ?>