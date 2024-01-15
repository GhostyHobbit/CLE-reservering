<?php
session_start();
session_unset();
session_destroy();

$login = false;

header('Location: index.php?login=false');
exit;
?>
