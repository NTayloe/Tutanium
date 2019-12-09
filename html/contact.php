<?php require_once('../includes/helper.php'); ?>
<?php require_once('../includes/db_connection.php'); ?>

<?php render('header', array('title' => 'Tutanium')); ?>

<?php
    if (isset($_POST["submit"]))
    {
        if (empty($_POST["comments"]))	
        {
	        $error = true;
        }
        else
        {
            $connection = connect_to_db();

            $sql = sprintf("INSERT INTO `feedback`(`comment`) VALUES ('%s')",
                             $connection->real_escape_string($_POST["comments"]));
            
            $result = $connection->query($sql) or die(mysqli_error($connection));

            if ($result === false)
                die("Could not query database");
            else
                echo '<script>';
                echo 'alert("Feedback received")';
                echo '</script>';
        }
    }
?>

<div class="container">

    <img src="../images/Tutanium_Phrase2.png" alt="Tutanium, Smart and simple tutorials" style="height: 256; width: 512;"/>

    <h2>Contact Info</h2>
    <h5><ul>
        <li>Conner G: gillce01@pfw.edu</li>
        <li>Nick T: taylnw01@pfw.edu</li>
        <li>Austin A: adamat01@pfw.edu</li>
        <li>Seth S: snidso01@pfw.edu</li>
    </ul></h5>
    </br>
    <?php if (isset($error)): ?>
        <div style="color: red"><h2 style="margin-bottom: 0px">The feedback area cannot be blank</h2></div>
    <?php endif ?>
    </br>
    <h2>Feedback</h2>
    <h4>If you have any comments or questions please feel free to let us know down below.</h4>
    <form method="POST">
        <textarea name="comments" style="width: 500px;height: 200px"></textarea></br>
        <input class="btn btn-primary" style="background-color: #beb800; border-color: #beb800"
            name="submit" type="submit" value="Submit Feedback"/>
    </form>
    </br></br>
</div>

<?php render('footer'); ?>