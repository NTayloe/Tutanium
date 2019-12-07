<?php
    
    require_once('../../includes/database_interface.php');
    require_once('../../includes/db_connection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    //if not logged in redirect to the login page
    if(!isset($_SESSION['authenticated']) || $_SESSION["authenticated"] === false){
        echo "<script>console.log('not logged in');</script>";
        header("Location: /html/user_accounts/login.php");
    }

    //get a database connection
    $connection = connect_to_db();

    //get the user from the database
    $sql = sprintf("SELECT * FROM users WHERE username='%s'", $connection->real_escape_string($_SESSION['username']));

    //send the given sql query to the given db connection
    $result = queryDatabase($sql, $connection);

    //user account data
    $username;
    $firstname;
    $lastname;
    $birthday;
    $gender;
    $accountage;
    $email;
    $recoveryemail;

    //did we get a valid user?
    if($result->num_rows === 1){

        //get the query result as an array
        $user = $result->fetch_assoc();

        //store the account data we need
        $username = $user['username'];
        $firstname =  $user['firstname'];
        $lastname =  $user['lastname'];
        $birthday =  $user['birthday'];
        $gender =  $user['gender'];
        $accountage =  $user['date_created'];
        $email =  $user['email'];
        $recoveryemail =  $user['recovery_email'];

    }

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

    <div class="container" style="margin-top: 100px; margin-bottom: 200px;">
        
    <?php require_once('../../includes/helper.php'); ?>

    <?php render('header', array('title' => 'Tutanium')); ?>

        <div id="profile_block" style="margin-bottom: 50px;">
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
                    <td><?php if(isset($firstname) && isset($lastname)){echo htmlspecialchars($firstname . " " . $lastname);}?></td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">BIRTHDAY</p></td>
                    <td><?php if(isset($birthday)){echo htmlspecialchars($birthday);}?></td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">GENDER</p></td>
                    <td><?php if(isset($gender)){echo htmlspecialchars($gender);}?></td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">ACCOUNT AGE</p></td>
                    <td><?php if(isset($accountage)){echo htmlspecialchars($accountage);}?></td>
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
                    <td><?php if(isset($email)){echo htmlspecialchars($email);}?></td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">RECOVERY EMAIL</p></td>
                    <td><?php if(isset($recoveryemail)){echo htmlspecialchars($recoveryemail);}?></td>
                </tr>
                <tr>
                    <td><p class="font-weight-light">PASSWORD</p></td>
                    <td>{Password change info/change password}</td>
                </tr>
            </table>
        </div>

        <div id="delete_block">
            <button type="button" class="btn btn-danger" onclick="window.location = '/html/user_accounts/delete_account.php';">Delete Account</button>
        </div>

    </div>

    <?php render('footer'); ?>

</body>
</html>