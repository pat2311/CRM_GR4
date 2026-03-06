<?php

include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunder</title>
</head>
<body>

<?php include 'menu.php'?>

<header>
<p>Her kan du legge til nye kunder</p>
</header>

<main>
<from action="kunder_new_confirm.php" method="get">

<label for="kunde_id">Kunde ID:</label><br>
<input type="text" id="kunde_id" name="kunde_id"><br>

<label for="bedrift_navn">Bedrift navn:</label><br>
<input type="text" id="bedrift_navn" name="bedrift_navn"><br>

<label for="telefonnummer">Telefonnummer:</label><br>
<input type="text" id="telefonnummer" name="telefonnummer"><br>

<label for="epost">E-post/mail:</label><br>
<input type="text" id="epost" name="epost"><br>

<label for="adresse">Adresse:</label><br>
<input type="text" id="adresse" name="adresse"><br>

<label for="postnummer">Postnummer:</label><br>
<input type="text" id="postnummer" name="postnummer"><br>

<label for="by">By:</label><br>
<input type="text" id="by" name="by"><br><br>

<input type="submit" name="kunder" id="kunder" value="Legg til kunde">

</form>

</main>

</body>
</html>