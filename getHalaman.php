<?php
session_start();
$_SESSION['id_data'] = $_GET['id'];
$hal = $_GET['hal'];

header("location:$hal");
