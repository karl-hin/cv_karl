<?php
session_start();
if (!isset($_SESSION['countViewPage'])) {
    $_SESSION['countViewPage'] = 0;
    $_SESSION['dateFirstVisit'] = date('Y-m-d-H-i-s');
} else {
    $_SESSION['countViewPage']++;
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
    if ($page === 'contacts') {
        require 'include/header.php';
        require 'page/contacts.php';
        require 'include/footer.php';
    } else if ($page === 'hobby') {
        require 'include/header.php';
        require 'page/hobby.php';
        require 'include/footer.php';
    } else if ($page === 'accueil') {
        require 'include/header.php';
        require 'page/accueil.php';
        require 'include/footer.php';
    } else {
        require 'page/erreur404.php';
    }

} else {
    require 'include/header.php';
    require 'page/accueil.php';
    require 'include/footer.php';
}

