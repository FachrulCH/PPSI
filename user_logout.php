<?php
include_once '_include/db_function.php';

session_cek();
session_destroy();
header("Location: ".URLSITUS);
