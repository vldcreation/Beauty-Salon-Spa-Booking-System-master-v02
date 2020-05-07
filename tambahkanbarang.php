<?php
include 'db.php';
include 'commons/header.php';
                $jumlah = $_POST['jumlah'];
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                if (isset($_SESSION['items'][$id_product])) {
                    $_SESSION['items'][$id_product] += $jumlah;
                } else {
                    $_SESSION['items'][$id_product] = $jumlah; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                if (isset($_SESSION['items'][$id_product])) {
                    $_SESSION['items'][$id_product] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                if (isset($_SESSION['items'][$id_product])) {
                    if($_SESSION['items'] >= 0){
                    $_SESSION['items'][$id_product] -= 1;
                    }else{
                        $_SESSION['items'][$id_product] = 0;
                    }
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                if (isset($_SESSION['items'][$id_product])) {
                    unset($_SESSION['items'][$id_product]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }
?>