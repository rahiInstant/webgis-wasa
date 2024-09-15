<?php
ob_start();
session_start();

try {

    $dsn = "pgsql:host=aws-0-ap-southeast-1.pooler.supabase.com;dbname=first-webmap;port=6543";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];

    $pdo = new PDO($dsn, 'postgres.szqsjklrpylrvtddvbds', 'abdur_Rahaman/123', $opt);
} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
?>