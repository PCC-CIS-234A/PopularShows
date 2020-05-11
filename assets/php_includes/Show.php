<?php

class Show implements JsonSerializable {
    private $primaryTitle;
    private $startYear;
    private $averageRating;
    private $numVotes;

    public function __construct($properties)
    {
        $this->primaryTitle = $properties["primaryTitle"];
        $this->startYear = $properties["startYear"];
        $this->averageRating = $properties["averageRating"];
        $this->numVotes = $properties["numVotes"];
    }

    public static function find_titles($min_votes, $title_type, $genre)
    {
        return Database::find_titles($min_votes, $title_type, $genre);
    }

    public function getPrimaryTitle() {
        return $this->primaryTitle;
    }

    public function getStartYear() {
        return $this->startYear;
    }

    public function getAverageRating() {
        return $this->averageRating;
    }

    public function getNumVotes() {
        return $this->numVotes;
    }

    public function jsonSerialize()
    {
        return [
          "primaryTitle" => $this->primaryTitle,
          "startYear" => $this->startYear,
          "averageRating" => $this->averageRating,
          "numVotes" => $this->numVotes
        ];
    }
}