<?php 
    require_once('../includes/helper.php');
    require_once('../includes/database_interface.php');
    require_once('../includes/db_connection.php'); 
    
    render('header', array('title' => 'Viewer'));

    $connection = connect_to_db();

    $tutorialid = 22; // temporary variable until we can pull in ID
?>

<div class="container-fluid">
    <?php viewTutorial($connection, $tutorialid); ?> 
</div>

<?php render('footer'); ?>