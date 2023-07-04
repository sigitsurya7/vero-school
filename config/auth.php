<?php
require_once "setting.php";
session_start();
if(!isset($_SESSION["role"])) header("Location: ".$base_url['main']."/");

//** SESSION Routes Access View */
$isAdmin = ($_SESSION['role'] == 'admin');
$isOperator =  ($_SESSION['role'] == 'operator');

$isKesiswaan = ($_SESSION['role'] == 'kesiswaan');
$isTu = ($_SESSION['role'] == 'tu');
$isBp = ($_SESSION['role'] == 'bp');
$isPerpus = ($_SESSION['role'] == 'perpustakaan');

$isGuru = ($_SESSION['role'] == 'guru');

$isSiswa =  ($_SESSION['role'] == 'siswa');
$isWali =  ($_SESSION['role'] == 'wali');