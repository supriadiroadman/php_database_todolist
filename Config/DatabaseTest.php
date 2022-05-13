<?php
require_once __DIR__ . '/Database.php';
use Config\Database;

$obj = Database::getConnection();
echo "Sukses membuat koneksi ke database";