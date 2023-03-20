<?php
session_start();

if (!$_SESSION['usernamestudent']) {
    header("Location: index.php");
}

if (!$_SESSION['usernameteacher']) {
    header("Location: index.php");
}
