<?php

 include "connect.php";

 if(isset($_GET['kunder_new']) && ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
        $kunde_id = $_GET['kunde_id'];
        $bedrift_navn = $_GET['bedrift_navn'];
        $telefonnummer = $_GET['telefonnummer'];
        $epost = $_GET['epost'];
        $adresse = $_GET['adresse'];
        $postnummer = $_GET['postnummer'];
        $by = $_GET['by'];

        $sql = "Select * From Kunder where kunde_id = :kunde_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':kunde_id', $kunde_id);
        $stmt->execute();

        $kunde = $stmt->fetch(PDO::FETCH_ASSOC);

        print_r($kunde);

        if(!$kunde)
            {

            $sql = "INSERT INTO kunder (kunde_id, bedrift_navn, telefonnummer, epost, adresse, postnummer, by)
            VALUES (:kunde_id, :bedrift_navn, :telefonnummer, :epost, :adresse, :postnummer, :by)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':kunde_id', $kunde_id);
            $stmt->bindParam(':bedrift_navn', $bedrift_navn);
            $stmt->bindParam(':telefonnummer', $telefonnummer);
            $stmt->bindParam(':epost', $epost);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':postnummer', $postnummer);
            $stmt->bindParam(':by', $by);
            $stmt->execute();
            }

        else
            {
                $stmt =0;
            }
    }

    else
    {
        $stmt = 0;
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
           <p>Her kan du legge til nye kunder</p>
        </header>

        <main>
            <?php
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