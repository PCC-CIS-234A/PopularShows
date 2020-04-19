<?php
require_once "../php_includes/Database.php";

echo json_encode(Database::get_all_title_types());
