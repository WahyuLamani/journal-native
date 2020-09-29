<?php
require '../functions.php';

$keyword = $_GET['keyword'];
$query = ("SELECT * FROM wewenang WHERE nip = $keyword");
$query = query($query);
if ($query == 1) {
    echo " &#10004; Username tidak tersedia";
} else {
    echo " &#10060; Username masih tersedia";
}
