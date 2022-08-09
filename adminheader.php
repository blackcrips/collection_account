<?php
require_once('./includes/autoloadclasses.inc.php');
$clientsDetails = new Dbhview();
$clientsController = new Dbhcontroller();
$clientsController->noSessionLoginAdmin();
$agentsController = new Dbhcontroller();
$agentsController->logout();
$activeUserLogins = new Dbhcontroller();
$viewButtonCliked = new Dbhcontroller();
$changePassword = new Dbhcontroller();
$changePassword->changePassword();
$createuser = new Dbhcontroller();
$createuser->createUserRequest();
$dashBoards = new Dbhcontroller();
$getNewData = new Dbhcontroller;
$getNewData->logOutAgent();
$getNewData->updateUserDetails();
$getNewData->deleteUser();
$getTotal = new Dbhview;
$getNewData->getActiveSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin.css" class="rel">
    <link rel="stylesheet" href="./css/adminheader.css" class="rel">
    <link rel="stylesheet" href="./css/createuser.css" class="rel">
    <link rel="stylesheet" href="./css/dashboard.css" class="rel">
    <script src="./js/adminheader.js" defer></script>
    <title>New Aeging Admin</title>
</head>

<body>
    <div class="container-change-password" id="overlay">
        <form method="post">
            <div class="inside-change-password">
                <label for="old-password">Old Password: </label>
                <input type="password" name="old-password" id="old-password">
                <label for="new-password">New Password: </label>
                <input type="password" name="new-password" id="new-password">
                <label for="confirm-password">Confirm Password: </label>
                <input type="password" name="confirm-password" id="confirm-password">
                <div class="inside-button">
                    <button name="change-password" class='btn btn-primary'>Confirm</button>
                    <button id="change-cancel" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </form>
    </div>

    <div class="header" id="navigation-tab">
        <div class="tab-design" id="tab-design">
            <div class="tab-1"></div>
            <div class="tab-2"></div>
            <div class="tab-3"></div>
        </div>
        <div class="profile-name">
            <label>You are logged in as <span><?php echo $activeUserLogins->set_userdata()['fullname']; ?></span></label>
        </div>
    </div>
    <div class="navigation" id="navigation-content">
        <div class="content-container">
            <div id='btn-home'>Home</div>
            <div id='btn-create-user'>Create User</div>
            <div id='change-password'>Change Password</div>
            <div id='btn-dashboard'>Dashboard</div>
            <div id='btn-logout'>Logout</div>
        </div>
    </div>