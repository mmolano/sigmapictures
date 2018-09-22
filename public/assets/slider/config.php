<?php
session_start();

$pdo = new PDO('mysql:host=127.0.0.1;dbname=jerem195_espace_membre', 'jerem195_bdd', 'IEFBR14iefbr14');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;