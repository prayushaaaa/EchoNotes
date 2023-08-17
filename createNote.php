<?php 
    if(isset($_POST['save'])){
        require_once("notesConfig.php");

        $sc = new notesConfig();

        date_default_timezone_set('Asia/Kathmandu');$entry = date('Y-m-d H:i:s');

        $sc->setTitle($_POST['title']);
        $sc->setDescription($_POST['description']);
        $sc->setEntry($entry);

        $sc->insertData();
        

    }
?>