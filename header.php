<?php 
session_start();
if(!isset($_SESSION['login'])){
  header('location:login.php');
}

include "koneksi.php";
include "fungsi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/sticky-footer-navbar/">

    <title>Aplikasi | Koperasi</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <link href="assets/img/logo.png" rel="shortcut icon">

  <style>     
      body{
        background:url(assets/images/single_service_01.jpg);
      }
  </style>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="ic on-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Koperasi</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="./"><font face="tracks"></font></a></li>
            <li><a href="./"><font face="tracks">Home</font></a></li>
            <li><a href="about_us.php"><font face="tracks">About Us</font></a></li>
            <li><a href="data_admin.php"><font face="tracks">Data Admin</font></a></li>
            <li><a href="data_anggota.php"><font face="tracks">Data Anggota</font></a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin logout?');"><strong><font face="times new roman">Logout</font></strong></a></li>
       
      </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>