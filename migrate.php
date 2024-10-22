<?php


$host = 'localhost';
$db = 'orange_store';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Retrieve existing migrations
$executedMigrations = $pdo->query("SELECT migration FROM migrations")->fetchAll(PDO::FETCH_COLUMN);
// Find migrations files in the migrations folder
$migrationFiles = scandir(__DIR__ . '/migrations');

// Prepare to run migrations
$batch = (int)$pdo->query("SELECT MAX(batch) FROM migrations")->fetchColumn() + 1;

foreach ($migrationFiles as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    $className = convertToClassName(pathinfo($file, PATHINFO_FILENAME));

    if (!in_array($className, $executedMigrations)) {
        require_once __DIR__ . '/migrations/' . $file;
        $migrationClass = new $className();
        $sql = $migrationClass->up();

        // Execute the migrations
        $pdo->exec($sql);

        // Record migrations in the database
        $stmt = $pdo->prepare("INSERT INTO migrations (migration, batch) VALUES (?, ?)");
        $stmt->execute([$className, $batch]);

        echo "Migration {$className} has been executed.\n";
    }
}

function convertToClassName($fileName)
{
    // Remove the date part (e.g., 2024_10_17_)
    $fileNameWithoutDate = preg_replace('/^\d{4}_\d{2}_\d{2}_/', '', $fileName);

    // Convert snake_case to PascalCase
    $parts = explode('_', $fileNameWithoutDate);
    $className = '';
    foreach ($parts as $part) {
        $className .= ucfirst($part);
    }

    return $className;
}
