<?php
    require_once("notesConfig.php");

    $note = new notesConfig();

    if(isset($_GET['id']) && isset($_GET['req'])){
        if($_GET['req'] == "delete"){
            $note->setID($_GET['id']);
            $note->delete();        
        }
    }
?>