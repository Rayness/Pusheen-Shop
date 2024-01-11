<?php
    $mysqli = new mysqli('localhost', 'root', '', 'pusheen');
    if ($mysqli->connect_error){
        die(' Connect error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
    } 
?>