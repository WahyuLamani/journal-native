<?php
session_start();
$dir = 'img/5f8aaf25c5066.jpg';

// readfile($dir);

if (file_exists($dir)) {
    unlink($dir);
    echo 'file berhasil di hapus';
} else {
    echo 'file tidak ada';
}
