<?php
/**
 * @Author: phantom-ghost-web
 * @Date:   2026-03-03 20:59:20
 * @Last Modified by:   phantom-ghost-web
 * @Last Modified time: 2026-03-17 08:40:25
 */

// Inkluderer database-tilkoblingsfilen
include '../connect.php';

// Sjekker om kunde_id er sendt via GET
if(isset($_GET['kunde_id']))
    {
        $kunde_id = $_GET['kunde_id'];

        // Henter kunde-data fra databasen
        $sql = "Select * From kunder where kunde_id = :kunde_id";
        $stmt = $pdo->prepare($sql);
        $stmt ->bindParam(':kunde_id', $kunde_id);
        $stmt->execute();

        $kunder = $stmt->fetch(PDO::FETCH_ASSOC);

        // Skriver ut rådata for debugging
        print_r($kunder);
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <title>Rediger kunde</title>
    </head>
    <body>
        <!-- Inkluderer meny-filen -->
        <?php include '../menu.php'; ?>
        
        <!-- Header-seksjon -->
        <header>
            <h1>Rediger kunder</h1>
        </header>

        <!-- Hovedinnhold med skjema for redigering -->
        <main>
        <form action="kunder_rediger_bekreft.php" method="get">

        <label for="kunde_id">Kunde ID</label>
        <input type="text" name="kunde_id" id="kunde_id" value="<?php echo htmlspecialchars($kunder['kunde_id']); ?>" readonly required> <br><br>

        <label for="bedriftnavn">Bedriftnavn</label>
        <input type="text" name="bedriftnavn" id="bedriftnavn" value="<?php echo htmlspecialchars($kunder['bedriftnavn']); ?>" required> <br><br>

        <label for="telefonnummer">Telefonnummer</label>
        <input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo htmlspecialchars($kunder['telefonnummer']); ?>" required> <br><br>

        <label for="mail">E-post</label>
        <input type="text" name="mail" id="mail" value="<?php echo htmlspecialchars($kunder['mail']); ?>" required> <br><br>

        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" value="<?php echo htmlspecialchars($kunder['adresse']); ?>" required> <br><br>

        <label for="postnummer">Postnummer</label>
        <input type="text" name="postnummer" id="postnummer" value="<?php echo htmlspecialchars($kunder['postnummer']); ?>" required> <br><br>

        <label for="by">By</label>
        <input type="text" name="by" id="by" value="<?php echo htmlspecialchars($kunder['by']); ?>" required> <br><br>

        <input type="submit" name="kunder_edit" id="kunder_edit" value="Lagre">

        </main>

    </body>
    </html>