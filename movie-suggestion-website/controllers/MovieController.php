<?php
include_once 'models/MovieModel.php';

class MovieController {
    private $movieModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->movieModel = new MovieModel($db);
    }

    public function addMovie($title, $genre, $description, $release_date, $rating, $image) {
        if ($this->movieModel->addMovie($title, $genre, $description, $release_date, $rating, $image)) {
            header("Location: index.php");
        }
    }

    public function listMovies() {
        return $this->movieModel->getMovies();
    }

    public function viewMovie($id) {
        return $this->movieModel->getMovieById($id);
    }
}