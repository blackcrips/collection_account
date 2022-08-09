<?php
    require_once("./includes/autoloadclasses.inc.php");
    $userlogin = new Dbhcontroller();
    $userlogin->agentsLogin();
    $userlogin->redirectToHomepage();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css" class="rel">
    <title>Agents Login</title>
</head>
<body>
    <div class="container-body">
        <form method="post">
            <div class="container-header">
                <label class="title"></label>
            </div>
            <div class="container-user-login">
                <div class="container-userlogin">
                    <input type="text" name="username" class="username" placeholder="Username">
                    <input type="password" name="password" class="password" placeholder="Password">
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-primary" name="submit-login">Submit</button>
                </div>                
            </div>
        </form>
    </div>
</body>
</html>