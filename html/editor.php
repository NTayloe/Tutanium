<?php 
    require_once('../includes/helper.php');
    require_once('../includes/database_interface.php');
    require_once('../includes/db_connection.php');

    render('header', array('title' => 'Editor'));
?>

<link rel="stylesheet" href="/css/shop-homepage.css">
<script src="editor.js"></script>

<style>
    ul {
        list-style-type: none;
    }
</style>

<?php 
    // submits a single entry into the entry table
    function submitEntry($connection, $name, $type, $startofnumber, $value, $tutorialid) {
        $entrySQL = sprintf("INSERT INTO `entry`(`tutorialid`, `data`, `type`, `number`) VALUES 
        ('%d', '%s', \"$type\", '%d')",
        $tutorialid,
        $connection->real_escape_string($value),
        intval(substr($name, $startofnumber)));
        if (queryDatabase($entrySQL, $connection) === false) {
            die("Could not query database");
        }
    }

    // verification and database actions
    if (isset($_POST['save']) || isset($_POST['publish'])) {
        if (!(isset($_POST['header1']) || isset($_POST['text1']) || isset($_POST['picture1']) || isset($_POST['video1']))) {
            $emptyTutorial = true; // dropbox is empty
        } else {
            $connection = connect_to_db();

            $published = 0;

            if(isset($_POST['publish'])) {
                $published = 1; // published was pressed, rather than save
            }

            $tutorialSQL = sprintf("INSERT INTO `tutorial`(`userid`, `title`, `description`, `category`, `published`) VALUES 
                (1, '%s', '%s', '%s', '%d')",
                $connection->real_escape_string($_POST["title"]),
                $connection->real_escape_string($_POST["description"]),
                $connection->real_escape_string($_POST["category"]),
                $published);
                
            // updating tutorial table
            if (queryDatabase($tutorialSQL, $connection) === false) {
                die("Could not query database");
            }
                
            $tutorialid = $connection->insert_id;

            // updating entry table
            foreach($_POST as $name => $value) {
                if ($value === "" || $name === "save" || $name === "publish") {
                    continue;
                } else if (strpos($name, 'header') !== false) {
                    submitEntry($connection, $name, "Header", 6, $value, $tutorialid);
                } else if (strpos($name, 'text') !== false) {
                    submitEntry($connection, $name, "Text", 4, $value, $tutorialid);
                } else if (strpos($name, 'picture') !== false) {
                    submitEntry($connection, $name, "Picture", 7, $value, $tutorialid);
                } else if (strpos($name, 'video') !== false) {
                    submitEntry($connection, $name, "Video", 5, $value, $tutorialid);
                }
            }
        }
    }
?>

<!-- HTML -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <!-- Draggable items -->
            <h3>Drag:</h3>
            <ul id="dragboxes">
                <li><a id="dragH" class="btn btn-secondary btn-card" draggable="true" ondragstart="drag(event)" role="button"><i class="fas fa-heading"></i></a></li> <!-- Header -->
                <li><a id="dragT" class="btn btn-secondary btn-card" draggable="true" ondragstart="drag(event)" role="button"><i class="fas fa-align-center"></i></a></li> <!-- Text -->
                <li><a id="dragP" class="btn btn-secondary btn-card" draggable="true" ondragstart="drag(event)" role="button"><i class="fas fa-image"></i></a></li> <!-- Picture -->
                <li><a id="dragV" class="btn btn-secondary btn-card" draggable="true" ondragstart="drag(event)" role="button"><i class="fas fa-video"></i></a></li> <!-- Video -->
            </ul>
        </div>
        <div class="col-sm-10">
            <form id="basicinfo" action="editor.php" method="POST" onsubmit="return fieldsNotEmpty()">
                <div class="row">
                    <div class="col-sm-8">
                        <!-- Drop/edit/rearrange zone -->
                        <h3>Drop here:</h3>
                        <div id="dropzone" class="drop-zone" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                    </div>
                    <div class="col-sm-4">
                        <!-- Basic tutorial info -->
                        <fieldset>
                            <h3>Tutorial details:</h3>
                            <input name="title" id="tutorialtitle" class="form-control input-sm" type="text" placeholder="Title"/><br />
                            <textarea name="description" id="tutorialdescription" class="form-control" placeholder="Description" rows="2" cols="40"></textarea><br />
                            <div class="form-group form-inline" style="text-align: center">
                                <label for="category" class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category">
                                        <?php 
                                            foreach ($CATEGORIES as $cat)
                                            {
                                                if (isset($_POST["category"]) && $_POST["category"] == $cat)
                                                    echo "<option selected='selected value='$cat'>$cat</option>";
                                                else
                                                    echo "<option value='$cat'>$cat</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <!-- Save and publish buttons --><br />
                            <input name="save" type="submit" value="Save" class="btn btn-light" role="button">
                            <input name="publish" class="btn btn-warning" type="submit" value="Publish" role="button">
                            <div id="errordiv" style="color: red"></div>
                            <?php if (isset($emptyTutorial)): ?>
                                <div style="color: red">You cannot submit an empty tutorial.</div>
                            <?php endif ?>
                            <?php if (isset($errorPrint)): ?>
                                <div style="color: red"><?php echo $errorPrint ?></div>
                            <?php endif ?>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php render('footer'); ?>