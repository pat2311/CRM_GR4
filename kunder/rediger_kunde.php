<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 09:56:46
 */


// Inkluderer database-tilkoblingsfilen
include '../connect.php';

// Sjekker om kunde_id er sendt via GET
if(isset($_GET['kunde_id']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
        $kunde_id = $_GET['kunde_id'];

        // Henter kunde-data fra databasen
        $sql = "SELECT * FROM kunder WHERE kunde_id = :kunde_id";
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
        <?php include '../meny.php'; ?>
        
        <!-- Header-seksjon -->
        <header>
            <h1>Rediger kunder</h1>
        </header>

        <!-- Hovedinnhold med skjema for redigering -->
        <main>
            <form action="rediger_bekreft_kunde.php" method="get">

            <label for="kunde_id">Kunde ID</label>
            <input type="text" name="kunde_id" id="kunde_id" value="<?php echo htmlspecialchars($kunder['kunde_id']); ?>" readonly required> <br><br>

            <label for="bedriftnavn">Bedriftnavn</label>
            <input type="text" name="bedriftnavn" id="bedriftnavn" value="<?php echo htmlspecialchars($kunder['bedriftnavn']); ?>" required> <br><br>

            <label for="telefonnummer">Telefonnummer</label>
            <input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo htmlspecialchars($kunder['telefonnummer']); ?>" required> <br><br>

            <label for="epost">E-post</label>
            <input type="text" name="epost" id="epost" value="<?php echo htmlspecialchars($kunder['epost']); ?>" required> <br><br>

            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo htmlspecialchars($kunder['adresse']); ?>" required> <br><br>

            <label for="postnummer">Postnummer</label>
            <input type="text" name="postnummer" id="postnummer" value="<?php echo htmlspecialchars($kunder['postnummer']); ?>" required> <br><br>

            <label for="city">By</label>
            <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($kunder['city']); ?>" required> <br><br>

            <input type="submit" name="rediger_kunde" id="rediger_kunde" value="Lagre">
            
            </form>


            
        </main>

    </body>
    </html>