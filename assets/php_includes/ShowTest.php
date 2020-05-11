<?php
require_once "Show.php";
require_once "Database.php";

use PHPUnit\Framework\TestCase;

class ShowTest extends TestCase
{

    public function test__construct()
    {
        $show = new Show([
            "primaryTitle" => "My Title",
            "startYear" => 2020,
            "averageRating" => 5.5,
            "numVotes" => 12345
        ]);
        $this->assertEquals("My Title", $show->getPrimaryTitle());
        $this->assertEquals(2020, $show->getStartYear());
        $this->assertEquals(5.5, $show->getAverageRating());
        $this->assertEquals(12345, $show->getNumVotes());
    }

    public function testFind_titles_no_results()
    {
        $shows = Show::find_titles(5000000, "movie", "Sci-Fi");
        $this->assertCount(0, $shows);
    }

    public function testFind_titles_valid_search()
    {
        $shows = Show::find_titles(50000, "movie", "Sci-Fi");
        $expectedShows = array (
            0 =>
                new Show(array(
                    'primaryTitle' => 'Inception',
                    'startYear' => '2010',
                    'averageRating' => '8.8',
                    'numVotes' => '1675116',
                )),
            1 =>
                new Show(array(
                    'primaryTitle' => 'The Matrix',
                    'startYear' => '1999',
                    'averageRating' => '8.7',
                    'numVotes' => '1375644',
                )),
            2 =>
                new Show(array(
                    'primaryTitle' => 'Interstellar',
                    'startYear' => '2014',
                    'averageRating' => '8.6',
                    'numVotes' => '1142217',
                )),
            3 =>
                new Show(array(
                    'primaryTitle' => 'Terminator 2',
                    'startYear' => '1991',
                    'averageRating' => '8.5',
                    'numVotes' => '834081',
                )),
            4 =>
                new Show(array(
                    'primaryTitle' => 'Back to the Future',
                    'startYear' => '1985',
                    'averageRating' => '8.5',
                    'numVotes' => '842258',
                )),
            5 =>
                new Show(array(
                    'primaryTitle' => 'Alien',
                    'startYear' => '1979',
                    'averageRating' => '8.5',
                    'numVotes' => '652049',
                )),
            6 =>
                new Show(array(
                    'primaryTitle' => 'The Prestige',
                    'startYear' => '2006',
                    'averageRating' => '8.5',
                    'numVotes' => '972563',
                )),
            7 =>
                new Show(array(
                    'primaryTitle' => 'Aliens',
                    'startYear' => '1986',
                    'averageRating' => '8.4',
                    'numVotes' => '554066',
                )),
            8 =>
                new Show(array(
                    'primaryTitle' => 'Metropolis',
                    'startYear' => '1927',
                    'averageRating' => '8.3',
                    'numVotes' => '128023',
                )),
            9 =>
                new Show(array(
                    'primaryTitle' => 'A Clockwork Orange',
                    'startYear' => '1971',
                    'averageRating' => '8.3',
                    'numVotes' => '631515',
                )),
            10 =>
                new Show(array(
                    'primaryTitle' => '2001: A Space Odyssey',
                    'startYear' => '1968',
                    'averageRating' => '8.3',
                    'numVotes' => '488549',
                )),
            11 =>
                new Show(array(
                    'primaryTitle' => 'Eternal Sunshine of the Spotless Mind',
                    'startYear' => '2004',
                    'averageRating' => '8.3',
                    'numVotes' => '756104',
                )),
            12 =>
                new Show(array(
                    'primaryTitle' => 'V for Vendetta',
                    'startYear' => '2005',
                    'averageRating' => '8.2',
                    'numVotes' => '887861',
                )),
            13 =>
                new Show(array(
                    'primaryTitle' => 'Blade Runner',
                    'startYear' => '1982',
                    'averageRating' => '8.2',
                    'numVotes' => '566303',
                )),
            14 =>
                new Show(array(
                    'primaryTitle' => 'PK',
                    'startYear' => '2014',
                    'averageRating' => '8.2',
                    'numVotes' => '117263',
                )),
            15 =>
                new Show(array(
                    'primaryTitle' => 'Blade Runner 2049',
                    'startYear' => '2017',
                    'averageRating' => '8.2',
                    'numVotes' => '241455',
                )),
            16 =>
                new Show(array(
                    'primaryTitle' => 'Logan',
                    'startYear' => '2017',
                    'averageRating' => '8.1',
                    'numVotes' => '449791',
                )),
            17 =>
                new Show(array(
                    'primaryTitle' => 'Guardians of the Galaxy',
                    'startYear' => '2014',
                    'averageRating' => '8.1',
                    'numVotes' => '816727',
                )),
            18 =>
                new Show(array(
                    'primaryTitle' => 'Mad Max: Fury Road',
                    'startYear' => '2015',
                    'averageRating' => '8.1',
                    'numVotes' => '691143',
                )),
            19 =>
                new Show(array(
                    'primaryTitle' => 'Jurassic Park',
                    'startYear' => '1993',
                    'averageRating' => '8.1',
                    'numVotes' => '706033',
                )),
            20 =>
                new Show(array(
                    'primaryTitle' => 'The Thing',
                    'startYear' => '1982',
                    'averageRating' => '8.1',
                    'numVotes' => '298210',
                )),
            21 =>
                new Show(array(
                    'primaryTitle' => 'Stalker',
                    'startYear' => '1979',
                    'averageRating' => '8.1',
                    'numVotes' => '82660',
                )),
            22 =>
                new Show(array(
                    'primaryTitle' => 'Solaris',
                    'startYear' => '1972',
                    'averageRating' => '8.1',
                    'numVotes' => '62746',
                )),
            23 =>
                new Show(array(
                    'primaryTitle' => 'The Truman Show',
                    'startYear' => '1998',
                    'averageRating' => '8.1',
                    'numVotes' => '763267',
                )),
            24 =>
                new Show(array(
                    'primaryTitle' => 'Donnie Darko',
                    'startYear' => '2001',
                    'averageRating' => '8.1',
                    'numVotes' => '651255',
                )),
            25 =>
                new Show(array(
                    'primaryTitle' => 'The Avengers',
                    'startYear' => '2012',
                    'averageRating' => '8.1',
                    'numVotes' => '1085311',
                )),
            26 =>
                new Show(array(
                    'primaryTitle' => 'Star Trek',
                    'startYear' => '2009',
                    'averageRating' => '8.0',
                    'numVotes' => '539056',
                )),
            27 =>
                new Show(array(
                    'primaryTitle' => 'The Man from Earth',
                    'startYear' => '2007',
                    'averageRating' => '8.0',
                    'numVotes' => '149020',
                )),
            28 =>
                new Show(array(
                    'primaryTitle' => 'District 9',
                    'startYear' => '2009',
                    'averageRating' => '8.0',
                    'numVotes' => '575911',
                )),
            29 =>
                new Show(array(
                    'primaryTitle' => 'Twelve Monkeys',
                    'startYear' => '1995',
                    'averageRating' => '8.0',
                    'numVotes' => '511215',
                )),
            30 =>
                new Show(array(
                    'primaryTitle' => 'Planet of the Apes',
                    'startYear' => '1968',
                    'averageRating' => '8.0',
                    'numVotes' => '148959',
                )),
            31 =>
                new Show(array(
                    'primaryTitle' => 'Brazil',
                    'startYear' => '1985',
                    'averageRating' => '8.0',
                    'numVotes' => '165889',
                )),
            32 =>
                new Show(array(
                    'primaryTitle' => 'The Terminator',
                    'startYear' => '1984',
                    'averageRating' => '8.0',
                    'numVotes' => '673470',
                )),
            33 =>
                new Show(array(
                    'primaryTitle' => 'Her',
                    'startYear' => '2013',
                    'averageRating' => '8.0',
                    'numVotes' => '419918',
                )),
            34 =>
                new Show(array(
                    'primaryTitle' => 'X-Men: Days of Future Past',
                    'startYear' => '2014',
                    'averageRating' => '8.0',
                    'numVotes' => '577571',
                )),
            35 =>
                new Show(array(
                    'primaryTitle' => 'The Martian',
                    'startYear' => '2015',
                    'averageRating' => '8.0',
                    'numVotes' => '603973',
                )),
            36 =>
                new Show(array(
                    'primaryTitle' => 'Arrival',
                    'startYear' => '2016',
                    'averageRating' => '7.9',
                    'numVotes' => '431191',
                )),
            37 =>
                new Show(array(
                    'primaryTitle' => 'Edge of Tomorrow',
                    'startYear' => '2014',
                    'averageRating' => '7.9',
                    'numVotes' => '501313',
                )),
            38 =>
                new Show(array(
                    'primaryTitle' => 'E.T. the Extra-Terrestrial',
                    'startYear' => '1982',
                    'averageRating' => '7.9',
                    'numVotes' => '313381',
                )),
            39 =>
                new Show(array(
                    'primaryTitle' => 'King Kong',
                    'startYear' => '1933',
                    'averageRating' => '7.9',
                    'numVotes' => '69940',
                )),
            40 =>
                new Show(array(
                    'primaryTitle' => 'Frankenstein',
                    'startYear' => '1931',
                    'averageRating' => '7.9',
                    'numVotes' => '54307',
                )),
            41 =>
                new Show(array(
                    'primaryTitle' => 'Children of Men',
                    'startYear' => '2006',
                    'averageRating' => '7.9',
                    'numVotes' => '399554',
                )),
            42 =>
                new Show(array(
                    'primaryTitle' => 'Moon',
                    'startYear' => '2009',
                    'averageRating' => '7.9',
                    'numVotes' => '289937',
                )),
            43 =>
                new Show(array(
                    'primaryTitle' => 'Iron Man',
                    'startYear' => '2008',
                    'averageRating' => '7.9',
                    'numVotes' => '774071',
                )),
            44 =>
                new Show(array(
                    'primaryTitle' => 'Serenity',
                    'startYear' => '2005',
                    'averageRating' => '7.9',
                    'numVotes' => '258313',
                )),
            45 =>
                new Show(array(
                    'primaryTitle' => 'X-Men: First Class',
                    'startYear' => '2011',
                    'averageRating' => '7.8',
                    'numVotes' => '571590',
                )),
            46 =>
                new Show(array(
                    'primaryTitle' => 'Gattaca',
                    'startYear' => '1997',
                    'averageRating' => '7.8',
                    'numVotes' => '243674',
                )),
            47 =>
                new Show(array(
                    'primaryTitle' => 'The Day the Earth Stood Still',
                    'startYear' => '1951',
                    'averageRating' => '7.8',
                    'numVotes' => '68955',
                )),
            48 =>
                new Show(array(
                    'primaryTitle' => 'Back to the Future Part II',
                    'startYear' => '1989',
                    'averageRating' => '7.8',
                    'numVotes' => '387841',
                )),
            49 =>
                new Show(array(
                    'primaryTitle' => 'Predator',
                    'startYear' => '1987',
                    'averageRating' => '7.8',
                    'numVotes' => '319489',
                )),
        );
        $this->assertEquals($expectedShows, $shows);
    }

    public function testGetPrimaryTitle()
    {
        $show = new Show([ "primaryTitle" => "My Title", "startYear" => 0,
            "averageRating" => 0.0, "numVotes" => 0]);
        $this->assertEquals("My Title", $show->getPrimaryTitle());
    }

    public function testGetStartYear()
    {
        $show = new Show([ "primaryTitle" => "", "startYear" => 2020,
            "averageRating" => 0.0, "numVotes" => 0]);
        $this->assertEquals(2020, $show->getStartYear());
    }

    public function testGetAverageRating()
    {
        $show = new Show([ "primaryTitle" => "", "startYear" => 0,
            "averageRating" => 5.5, "numVotes" => 0]);
        $this->assertEquals(5.5, $show->getAverageRating());
    }

    public function testGetNumVotes()
    {
        $show = new Show([ "primaryTitle" => "", "startYear" => 0,
            "averageRating" => 0.0, "numVotes" => 12345]);
        $this->assertEquals(12345, $show->getNumVotes());
    }

    public function testJsonSerialize()
    {
        $show = new Show([
            "primaryTitle" => "My Title",
            "startYear" => 2020,
            "averageRating" => 5.5,
            "numVotes" => 12345
        ]);
        $this->assertEquals([
            "primaryTitle" => "My Title",
            "startYear" => 2020,
            "averageRating" => 5.5,
            "numVotes" => 12345
        ], $show->jsonSerialize());
    }
}
