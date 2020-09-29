<?php
require '../functions.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM wewenang WHERE nip = '$keyword'";
$query = query($query);

$ret = count($query) > 0 ? 1 : 0;
$result = [
  'status' => $ret,
];

echo json_encode($result, JSON_PRETTY_PRINT);