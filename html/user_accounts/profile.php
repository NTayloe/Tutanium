<?php
    
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/navbar-footer.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/user_accounts/profile.css">
    <title>My Profile</title>
</head>
<body>

    <div class="container">
        
    <?php require_once('../includes/helper.php'); ?>

    <?php render('header', array('title' => 'Tutanium')); ?>

        <div id="profile_block" style="margin-top: 100px;">
            <div>
                <div style="display: inline-block;">
                    <h1>Account Info</h1>
                </div>

                <div id="avatar_wrapper">
                    <img src="/html/user_accounts/res/abstract_user.svg" alt="Avatar" class="avatar" onclick="">
                </div>
            </div>
            <table class="table profile-table">
                <tr>
                    <td><p class="font-weight-light">NAME</p></td>
                    <td>{User's Name}</td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">BIRTHDAY</p></td>
                    <td>{Date}</td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">GENDER</p></td>
                    <td>{M/F}</td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">ACCOUNT AGE</p></td>
                    <td>{Age}</td>
                </tr>
            </table>
        </div>
        
        <div id="profile_block">
            <div>
                <div style="display: inline-block;">
                    <h1>Account Credentials</h1>
                </div>
            </div>
            <table class="table profile-table">
                <tr>
                    <td><p class="font-weight-light">EMAIL</p></td>
                    <td>{EMAIL}</td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">RECOVERY EMAIL</p></td>
                    <td>{EMAIL}</td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">PASSWORD</p></td>
                    <td>{Password change info/change password}</td>
                </tr>
            </table>
        </div>

        <div id="delete_block">
            <button type="button" class="btn btn-danger">Delete Account</button>
        </div>

    </div>

    <?php render('footer'); ?>

</body>
</html>