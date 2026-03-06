<?php
// connect the databese

$server = "localhost";
$username = "root";
$password = "";
$database = "CRM_GR4";

try
{
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully";
}

catch(PDOException $e)
{
    die("oppkobling feilet: ".$e->getMessage()."<br>");
}