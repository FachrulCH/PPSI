<?php
include_once 'db_function.php';
include_once 'trip.php';

$jumData    = Trip_total();               //Jumlah halaman
$JmlHalaman = ceil($jumData/$batas);    //ceil digunakan untuk pembulatan keatas
