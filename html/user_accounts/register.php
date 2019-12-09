<?php

    require_once('../../includes/database_interface.php');
    require_once('../../includes/db_connection.php');

    if(!isset($_SESSION)){
        session_start();
    }

    //if already logged in redirect to the profile page
    if(isset($_SESSION['authenticated']) && $_SESSION["authenticated"] === true){
        echo "<script>console.log('preauth');</script>";
        header("Location: /html/user_accounts/profile.php");
    }

    if(isset($_POST['submit'])){
        
        //get a database connection
        $connection = connect_to_db();

        //get the current date for account age in the database
        date_default_timezone_set('US/Eastern');
        $currentdate = date('Y-m-d');

        //get the account info inputed through the form, accounting for errors and code injection
        $firstName = null;
        $lastName = null;
        $birthDate = null;
        $gender = null;
        $email = null;
        $username = null;
        $password1 = null;
        $password2 = null;

        $error;

        if(isset($_POST['firstname']))
            $firstName = htmlspecialchars($_POST['firstname']);

        if(isset($_POST['lastname']))
            $lastName = htmlspecialchars($_POST['lastname']);

        if(isset($_POST['birthdate']))
            $birthDate = htmlspecialchars($_POST['birthdate']);

        if(isset($_POST['gender']))
            $gender = htmlspecialchars($_POST['gender']);

        if(isset($_POST['email'])){
            
            $email = htmlspecialchars($_POST['email']);

            //make sure email wasn't already used
            if(checkValueAlreadyExist($connection->real_escape_string($_POST['email']), 'email', 'users', $connection)){
                //error handling
                $error = "email already used";
            }

        }

        if(isset($_POST['username']) && !isset($error)){
           
            $username = htmlspecialchars($_POST['username']);

            //make sure username doesn't already exist
            if(checkValueAlreadyExist($connection->real_escape_string($_POST['username']), 'username', 'users', $connection)){
                //error handling
                $error = "username already used";
            }

        }

        if(isset($_POST['firstpass']) && !isset($error))
            $password1 = htmlspecialchars($_POST['firstpass']);
        
        if(isset($_POST['secondpass']) && !isset($error))    
            $password2 = htmlspecialchars($_POST['secondpass']);


        //if there are no errors run the querry
        if(!isset($error)){

            //add the user to the database
            $sql = sprintf("INSERT INTO `users`(`username`, `firstname`, `lastname`, `gender`, `birthday`, `pass`, `date_created`, `email`) VALUES ('%s', '%s', '%s', '%s', '%s', PASSWORD('%s'), '%s', '%s')",
                            $connection->real_escape_string($username),
                            $connection->real_escape_string($firstName),
                            $connection->real_escape_string($lastName),
                            $connection->real_escape_string($gender),
                            $connection->real_escape_string($birthDate),
                            $connection->real_escape_string($password1),
                            $connection->real_escape_string($currentdate),
                            $connection->real_escape_string($email));

            $result = queryDatabase($sql, $connection);

            if($result === false){
                //couldn't query db
            }

            $_SESSION["authenticated"] = true;
            $_SESSION["username"] = $username;
            header("Location: /html/user_accounts/profile.php");

        }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/user_accounts/register.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/js/user_accounts/register.js"></script>
    <title>Register</title>
</head>
<body>
    <?php require_once('../../includes/helper.php'); ?>

    <?php render('header', array('title' => 'Tutanium')); ?>

    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">

        <div id="title">
            <h2>Create an Account</h2>
            <?php
                if(isset($error)){
                    echo $error;
                }
            ?>
        </div>

        <div id="account_block">
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" onsubmit="return verify();">
                <label for="name_block" class="reg_label">Name:</label>
                <div class="form-group form-row" id="name_block">
                    <div class="col-md-6">
                        <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name">
                    </div>
                </div>

             
                <div class="form-group form-row" id="birthdate_block">
                    <div class="col-md-5">
                        <label for="birthdate_block" class="reg_label">Birth Date:</label>
                        <input type="date" id="birthdate" class="form-control" name="birthdate">
                    </div>
                   
                    <div class="col-md-1"></div>

                    <div class="col-md-6" id="gender_block">
                            <label for="gender_block" class="reg_label">Gender:</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                                    Female
                                </label>
                            </div>
                    </div>
                </div>

                <label for="email_block" class="reg_label">Email:</label>
                <div class="form-group form-row" id="email_block">
                    <div class="col-md-8">
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>

                <label for="username_block" class="reg_label">Username:</label>
                <div class="form-group form-row" id="username_block">
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                </div>

                <label for="pass_block" class="reg_label">Password:</label>
                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Must be between 10-99 chars long, and contain two of each (Capital, Symbol, and Number)"></i>
                <div class="form-group form-row" id="pass_block">
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="pass1" name="firstpass" placeholder="Enter Password">
                    </div>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="pass2" name="secondpass" placeholder="Confirm Password">
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-md-4">
                        <input type="submit" value="Create Account" class="btn btn-primary" id="createbutton" disabled="true" name="submit">
                    </div>
                    <div class="col-md-8">
                        <div class="form-check">
                            <input type="checkbox" class="btn" id="consentterms" onclick="toggleTerms();">
                            <label class="form-check-label btn" for="consentterms">I agree to <a target="_blank" href="/html/user_accounts/terms.html">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="login">
            Already have an Account? <a href="/html/user_accounts/login.html">Log In</a> Instead             
        </div>

    </div>

    <?php render('footer'); ?>
</body>
</html>

<script>//enable bootstrap tool-tips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>