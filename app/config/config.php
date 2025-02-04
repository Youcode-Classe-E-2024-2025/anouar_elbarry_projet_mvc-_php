<?php
 
 use App\Core\Database;

 // Database configuration
 $db = new Database(
  $_ENV['DB_HOST'] ?? 'localhost',
  $_ENV['DB_NAME'] ?? 'mvc',
  $_ENV['DB_NAME'] ?? 'postgres',
  $_ENV['DB_NAME'] ?? 'jppp5734'
 );

 return $db;