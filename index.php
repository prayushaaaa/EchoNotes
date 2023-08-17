<?php 
require_once("notesConfig.php");
$data = new notesConfig();
$all = $data->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>All notes</title>
    <style>
        h1 {
            display: flex;
            justify-content: center;
        }
        .card-body {
            height: 200px;
            overflow: auto;
            
        }        
    </style>
</head>
<body>
    <h1>Notes</h1>
    <div class="row row-cols-1 row-cols-md-4 g-3 p-2">
        <form action="createNote.php" method="post">
            <div class="card-body mb-3">
                <h2><input type="text" name="title" placeholder="Title" class="form-control" style="
                    font-size: 1.5rem;
                    font-weight: 500;
                    padding: 5%;
                    background-color: rgba( 33,37,41 , 0.03);" 
                    required></h2>
                <textarea name="description" placeholder="Description" class="form-control" style="
                    resize: none;
                    height: 18vh;
                    background-color: #f8f8f8;
                    padding: 5%;"
                required></textarea>
            </div>
            <div class="card-footer">
                <button type="submit" name="save" class="btn btn-success">Add New</button>
            </div>
        </form>
        <?php 
        foreach ($all as $key => $value) {    
        ?>
        <div class="col">
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-header"><?=$value['title']?></h2>
                        <i class="card-subtitle mb-2 text-muted"><?=$value['entry']?></i>
                        <p class="card-text"><?=$value['description']?></p>
                    </div>
                    <div class="card-footer">
                        <a href="editNote.php?id=<?=$value['id']?>&req=edit" class="btn btn-secondary">Edit</a>
                        <a href="deleteNote.php?id=<?=$value['id']?>&req=delete" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>
