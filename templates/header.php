<?php

    if(!isset($_SESSION)){
        session_start();
    }

    //if already logged in redirect to the profile page
    if(isset($_SESSION['authenticated']) && $_SESSION["authenticated"] === true){
        echo "<script>console.log('preauth');</script>";
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
    <link rel="stylesheet" href="/css/universal.css">
    <link rel="stylesheet" href="/css/shop-homepage.css">
    <script src="https://kit.fontawesome.com/3c565b20fe.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <title><?php echo htmlspecialchars($title)?></title>
</head>

<body>

    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="/html/index.php"><img src="/images/Tutanium_Logo.png" class="logo-image" alt="Tutanium pixel logo" height="20px" width="20px"> Tutanium</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>				
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/html/tutorials.php">Tutorials</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="btn-group">
                            <a href="/html/browse.php"><button type="button" class="nav-link btn btn-secondary" id="navbarDropdown">Browse</button></a>
                            <button type="button" class="nav-link btn btn-secondary dropdown-toggle dropdown-toggle-split" id="navbarDropdownCaret" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Browse</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Technology</a>
                                <a class="dropdown-item" href="#">Science</a>
                                <a class="dropdown-item" href="#">Math</a>
                                <a class="dropdown-item" href="/html/art.php">Art</a>
                                <a class="dropdown-item" href="#">Food</a>
                                <a class="dropdown-item" href="#">Lifestyle</a>
                                <a class="dropdown-item" href="#">Nature</a>
                                <a class="dropdown-item" href="#">Music</a>
                                <a class="dropdown-item" href="#">Exercise</a>
                                <a class="dropdown-item" href="/html/browse.php">More...</a>
                            </div>
                        </div>
                    </li>
                    
                    <?php
                    
                        if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] === false){

                            echo "<li class=\"nav-item\">";
                            echo "<a class=\"nav-link\" href=\"/html/user_accounts/login.php\">Login</a>";
                            echo "</li>";

                            echo "<li class=\"nav-item\">";
                            echo "<a class=\"nav-link\" href=\"/html/user_accounts/register.php\">Register</a>";
                            echo "</li>";
                        }else if(isset($_SESSION['authenticated']) || $_SESSION['authenticated'] === true){
                            echo "<li class=\"nav-item\">";
                            echo "<a class=\"nav-link\" href=\"/html/user_accounts/profile.php\">Profile</a>";
                            echo "</li>";

                            echo "<li class=\"nav-item\">";
                            echo "<a class=\"nav-link\" href=\"/html/user_accounts/logout.php\">Logout</a>";
                            echo "</li>";
                        }

                    ?>

                </ul>
                <form class="form-inline my-2 my-lg-0" method="GET" action="">
                    <input class="form-control mr-sm-2" type="search" placeholder="Find a tutorial..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" style="display:none" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>

</body>