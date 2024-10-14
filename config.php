<?php 
  $host = 'localhost';
  $db = 'gallery';
  $user = 'root';
  $pw = '';

  $koneksi = mysqli_connect($host, $user, $pw, $db);

  if  (!$koneksi){
    die ("koneksi gagal : " . mysqli_connect_error());
  }
?>