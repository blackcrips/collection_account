<?php 
require_once('autoloadclasses.inc.php');

if(!isset($_POST['dashboard-logout'])){
    header("Location: ../admin.php");
}


if(isset($_POST['dashboard-logout'])){
    $id = $_POST['agent-id'];
    $status =' ';

    $logout = new Dbhcontroller();
    $logout->logOutAgent($status,$id);


    header("Location: ../dashboard.php");
}