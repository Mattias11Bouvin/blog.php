<?php

$host = "localhost";
$database ="database-intro";
$user       = "root";
$pass       = "root";
$charset    = "utf8mb4";

$dsn        = "mysql:host={$host};dbname={$database};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Error mode
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    // Fetch style 
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Catch blocket körs om något går fel med DB kopplingen
    // echo $e->getMessage();
    // echo $e->getCode();
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}