<?php

class Database
{
    const DB_SERVER = "cisdbss.pcc.edu";
    const DB_DATABASE = "IMDB";
    const DB_USER = "275student";
    const DB_PASSWORD = "275student";

    const GET_ALL_GENRES_SQL = "SELECT DISTINCT RTRIM(genre) AS genre FROM title_genre;";
    const GET_ALL_TITLE_TYPES_SQL = "SELECT DISTINCT RTRIM(titleType) AS titleType FROM title_basics;";
    const FIND_SHOWS_SQL = <<<QUERY
SELECT      TOP 50 
            primaryTitle, startYear, averageRating, numVotes
FROM        title_basics
JOIN        title_ratings ON title_basics.tconst = title_ratings.tconst
JOIN        title_genre ON title_basics.tconst = title_genre.tconst
WHERE       numVotes > :min_votes
AND         titleType = :title_type
AND         genre = :genre
ORDER BY    averageRating DESC;
QUERY;

    private static $db = NULL;

    private static function connect() {
        if (empty(Database::$db)) {
            Database::$db = new PDO(
                "sqlsrv:Server=" . Database::DB_SERVER . ";Database=" . Database::DB_DATABASE,
                Database::DB_USER,
                Database::DB_PASSWORD
            );
        }
    }

    public static function get_all_genres() {
        Database::connect();

        $stmt = Database::$db->prepare(Database::GET_ALL_GENRES_SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function get_all_title_types() {
        Database::connect();

        $stmt = Database::$db->prepare(Database::GET_ALL_TITLE_TYPES_SQL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find_titles($min_votes, $title_type, $genre)
    {
        Database::connect();

        $stmt = Database::$db->prepare(Database::FIND_SHOWS_SQL);
        $stmt->execute([
            ":min_votes" => $min_votes,
            ":title_type" => $title_type,
            ":genre" => $genre
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}