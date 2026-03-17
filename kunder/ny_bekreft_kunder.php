<?php
/**
 * @Author: phantom-ghost-web
 * @Date:   2026-03-03 10:13:20
 * @Last Modified by:   phantom-ghost-web
 * @Last Modified time: 2026-03-17 08:40:25
 */

// Inkluderer database-tilkoblingsfilen
include "../connect.php";

// Sjekker om skjemaet er sendt og metoden er GET
if(isset($_GET['kunder_new']) && ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
        // Henter data fra GET-parametere
        $bedriftnavn = $_GET['bedriftnavn'];
        $telefonnummer = $_GET['telefonnummer'];
        $mail = $_GET['mail'];
        $adresse = $_GET['adresse'];
        $postnummer = $_GET['postnummer'];
        $by = $_GET['by'];

        echo "Bedrift navn: " . $bedriftnavn . "<br>";
        echo "Telefonnummer: " . $telefonnummer . "<br>";
        echo "mail: " . $mail . "<br>";
        echo "Adresse: " . $adresse . "<br><br>";
        echo "Postnummer: " . $postnummer . "<br>";
        echo "By: " . $by . "<br><br>";

        // Sjekker om kunden allerede finnes
        // $sql = "Select * From kunder where kunde_id = :kunde_id";
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindParam(':kunde_id', $kunde_id);
        // $stmt->execute();

        // $kunde = $stmt->fetch(PDO::FETCH_ASSOC);

        // Skriver ut rådata for debugging
        // print_r($kunde);

        // Hvis kunden ikke finnes, legg til ny
       
        $sql = "INSERT INTO kunder (bedriftnavn, telefonnummer, mail, adresse, postnummer, by)
        VALUES (:bedriftnavn, :telefonnummer, :mail, :adresse, :postnummer, :by)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':bedriftnavn', $bedriftnavn);
        $stmt->bindParam(':telefonnummer', $telefonnummer);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':postnummer', $postnummer);
        $stmt->bindParam(':by', $by);
        $stmt->execute();
        

   
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
        <title>Legg til kunde - Bekreftelse</title>
    </head>
    <body>
        <!-- Inkluderer meny-filen -->
        <?php include 'menu.php'?>

        <!-- Header-seksjon -->
        <header>
           <p>Her kan du legge til nye kunder</p>
        </header>

        <!-- Hovedinnhold med bekreftelsesmelding -->
        <main>
            <?php
            // Viser melding basert på om innsettingen lyktes
            if($stmt)
                {
                    echo "Kunden er lagt til i databasen";
                }
            else
                {
                    echo "Kunden kunne ikke legges til i databasen";
                }
            ?>
        </main>

    </body>
    </html>