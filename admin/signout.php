<?php

    session_start();
    session_destroy();
    session_unset();
    $ref = 'index.php';
    if(isset($_GET['ref'])){
        $ref = $_GET['ref'];
    }
    header("Location: $ref");