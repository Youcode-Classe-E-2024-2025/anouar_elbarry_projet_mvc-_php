<?php
 
use App\Core\Database;

// Get database instance (it will use environment variables internally)
$db = Database::getInstance();

return $db;