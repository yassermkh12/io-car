<?php 
    session_start();
    session_destroy(); 
    header('Location:boite_verte.php'); 
?>