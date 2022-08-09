<?php
    require_once('./includes/autoloadclasses.inc.php');
    $clientsDetails = new Dbhview();
    $clientsController = new Dbhcontroller();
    $clientsController->noSessionLoginUser();
    $agentsController = new Dbhcontroller();
    $agentsController->logout();
    $activeUserLogins = new Dbhcontroller();
    $viewButtonCliked = new Dbhcontroller();
    $changePassword = new Dbhcontroller();
    $changePassword->changePassword();
    $viewButtonCliked->getActiveSession();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css" class="rel">
    <script src="./js/index.js" defer></script>
    <script src="./lib/moment/moment.min.js"></script>
    <script src="./js/search.js" defer></script>
    <title>New Aeging Login</title>
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

    <div class="container-header">
        <ul>
            <li class='hover-this'>                
                <a href="#" class="li-inside">You are logged in as <span><?php echo $activeUserLogins->set_userdata()['fullname']; ?></span></a>
                <ul>
                    <li>
                        <a href="#" id="change-password">Change Password</a>
                    </li>

                    <li>
                        <a href="#" name="logout" id="btn-logout">Logout</a>
                    </li>
                </ul>
            </li>

        </ul>        
    </div>