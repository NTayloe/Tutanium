<?php 
    require_once('../includes/helper.php');
    require_once('../includes/database_interface.php');
    require_once('../includes/db_connection.php'); 
    
    render('header', array('title' => 'Viewer'));

    $tutorialid = 22; // temporary variable until we can pull in ID
?>

<link rel="stylesheet" href="/css/shop-homepage.css">

<?php
    $connection = connect_to_db();

    $loadtutorials = sprintf("SELECT `title`, `description` FROM `tutorial`");

    function showTutorials($connection, $sql) {
        // displaying tutorials
        $result = $connection->query($sql) or die(mysqli_error($connection));
    
        while ($tutorial = $result->fetch_assoc())
        {
            echo "<button type=\"button\" onclick=\"window.location.href='/html/view.php'\">" . implode(" - ", $tutorial) . "</button><br />\n";
        }
        echo "\n";
    }

?>

<div class="container-fluid">
    <h1>Smart and Simple Tutorials</h1>
    <p>Our editor allows you to create dynamic tutorials in which you can share your knowledge in an easy, efficient way. Whether you want to share a single video or create a diverse media-filled article, Tutanium will work wonderfully for you. It only takes seconds for your tutorials to be visible to our users. If you're just looking to learn something new, you can search for a topic that interests you or sort all of our tutorials by category.</p>
    <div class="row">
        <a class="btn btn-secondary btn-card" href="/html/editor.php" role="button">Create a Tutorial</a>
    </div>
    <br /><br />
    <div class="row">
        <h3>Tutorials</h3>
        <div id="tutorials" class="container-fluid">
            <?php showTutorials($connection, $loadtutorials); ?>
        </div>
    </div>
</div>

<?php render('footer'); ?>