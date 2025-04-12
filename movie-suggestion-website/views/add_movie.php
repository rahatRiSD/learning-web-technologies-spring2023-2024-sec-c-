<?php
include_once 'controllers/MovieController.php';
$movieController = new MovieController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $release_date = $_POST['release_date'];
    $rating = $_POST['rating'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

    $movieController->addMovie($title, $genre, $description, $release_date, $rating, $image);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Add Your Favorite Movie</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Movie Title:</label>
        <input type="text" name="title" required><br>
        <label for="genre">Genre:</label>
        <input type="text" name="genre"><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="release_date">Release Date:</label>
        <input type="date" name="release_date" required><br>
        <label for="rating">Rating:</label>
        <input type="number" name="rating" min="0" max="10" step="0.1" required><br>
        <label for="image">Upload Movie Image:</label>
        <input type="file" name="image" required><br>
        <input type="submit" value="Add Movie">
    </form>
</body>
</html>