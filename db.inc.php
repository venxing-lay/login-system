<?php


$servername = "localhost";
$dBUsername = "root1";
$dBPassword = "root";
$dBName = "login";


$conn = mysqli_connect($servername , $dBUsername , $dBPassword , $dBName);


if(!$conn){

    die("Connection fail: " .mysqli_connect_error());
}