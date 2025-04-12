<?php
include_once 'config/database.php';

class MovieModel {
    private $conn;
    private $table_name = "movies";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addMovie($title, $genre, $description, $release_date, $rating, $image) {
        $query = "INSERT INTO " . $this->table_name . " (title, genre, description, release_date, rating, image) VALUES (:title, :genre, :description, :release_date, :rating, :image)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':release_date', $release_date);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':image', $image);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getMovies() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getMovieById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt;
    }
}