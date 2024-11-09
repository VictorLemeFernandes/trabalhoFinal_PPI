<?php
function verificarLogin() {
    session_start();
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header('Location: ../pages/loginPage/index.html');
        exit();
    }
}