<?php
session_start();

/** @var mysqli $db */
require_once 'includes/database.php';

$sessionId = $_SESSION['id'];
?>
