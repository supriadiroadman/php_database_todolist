<?php
require_once __DIR__ . '/Database.php';
use Config\Database;

$dbStatic = Database::getConnection();
echo "Sukses membuat koneksi ke database";