<?php 
require_once('notesConfig.php');

$notes = new notesConfig();
$id = $_GET['id'];
$notes->setID($id);

if(isset($_POST['edit'])){
    $notes->setTitle($_POST['title']);
    $notes->setDescription($_POST['description']);

    date_default_timezone_set('Asia/Kathmandu');
    $entry = date('Y-m-d H:i:s');

    $notes->setEntry($entry);

    echo $notes->update();
}
$record = $notes->fetchOne();

$note = $record[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-card {
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
            width: 70%;
        }
        .form-card textarea {
            resize: none;
            height: 30vh;
            background-color: #f8f8f8;
        }
    </style>
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <h2>Edit Note</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="title" placeholder="Title" class="form-control" value="<?=$note['title']?>" required>
                </div>
                <div class="mb-3">
                    <textarea name="description" placeholder="Description" class="form-control" required><?=$note['description']?></textarea>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
