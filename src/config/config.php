<?php
// Détecte automatiquement la base URL en fonction de l'arborescence
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/');
?>
