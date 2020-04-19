<?php
require_once "../php_includes/Database.php";

echo json_encode(Database::find_titles($_GET["min_votes"], $_GET["title_type"], $_GET["genre"]));
