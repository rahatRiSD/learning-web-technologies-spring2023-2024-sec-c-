<?php
include_once 'controllers/MovieController.php';
$movieController = new MovieController();
$movies = $movieController->listMovies();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Suggestions</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Welcome to Movie Suggestions</h1>
    <a href="views/add_movie.php">Add Your Favorite Movie</a>
    <h2>Movie List</h2>
    <ul>
        <?php while ($movie = $movies->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <a href="views/movie_details.php?id=<?php echo $movie['id']; ?>"><?php echo $movie['title']; ?></a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>