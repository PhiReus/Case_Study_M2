<?php
    define('ROOT_URL','http://localhost/case_study_m2');
    define('ROOT_DIR', dirname(__FILE__) );

    $username   = 'root';
    $password   = '';
    $database   = 'quan_ly_cau_thu';
    try {
        $conn = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
    } catch (Exception $e) {
        // echo $e->getMessage();
        echo '<h1>Khong the ket noi CSDL</h1>';
    }