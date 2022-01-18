<?php
session_start();
if (isset($_SESSION['cinefil@'])) {
    unset($_SESSION['cinefil@']);
    session_destroy();
    header("Location: ../../index.php");
}
