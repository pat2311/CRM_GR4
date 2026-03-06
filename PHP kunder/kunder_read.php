<?php

include "connect.php";

$sql = "SELECT * FROM Kunder";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$CRM_GR4 = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($CRM_GR4);
foreach($CRM_GR4 as $kunder)
    {
        echo "kunde ID: " . $kunder['kunde_id'] . "<br>";
        echo "Bedrift navn: " . $kunder['bedrift_navn'] . "<br>";
        echo "Telefonnummer: " . $kunder['telefonnummer'] . "<br>";
        echo "Email: " . $kunder['epost'] . "<br>";
        echo "Adresse: " . $kunder['adresse'] . "<br><br>";
        echo "Postnummer: " . $kunder['postnummer'] . "<br>";
        echo "By: " . $kunder['by'] . "<br><br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kunder</title>
</head>
<body>

    <?php include 'menu.php'?>

    <header>
    <p>Her kan du se alle kundene i databasen</p>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>kunde_ID</th>
                    <th>Bedrift navn</th>
                    <th>Telefonnummer</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Postnummer</th>
                    <th>by</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($CRM_GR4 as $kunder): ?>
                    <tr>
                        <td><?php echo $kunder['kunde_id']; ?></td>
                        <td><?php echo $kunder['bedrift_navn']; ?></td>
                        <td><?php echo $kunder['telefonnummer']; ?></td>
                        <td><?php echo $kunder['epost']; ?></td>
                        <td><?php echo $kunder['adresse']; ?></td>
                        <td><?php echo $kunder['postnummer']; ?></td>
                        <td><?php echo $kunder['by']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>