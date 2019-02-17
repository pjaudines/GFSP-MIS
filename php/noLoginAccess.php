<?php
    if(!isset($_SESSION['userOwner'])){
        header("Location: ../../login.php");
    }
?>