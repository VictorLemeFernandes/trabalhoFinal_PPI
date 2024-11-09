<?php

function exitWhenNotLoggedIn()
{
  if (!isset($_SESSION['loggedIn'])) {
    header('Location: ../pages/mainPage/mainPage_2_1.html');
    exit();
  }
}