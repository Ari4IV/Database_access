<?php

require_once('config.php'); // 載入資料庫連線設定檔

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        CREATE TABLE IF NOT EXISTS `student` (
            `student_id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL,
            `phone` VARCHAR(50) NOT NULL,
            `class_name` VARCHAR(20) NOT NULL,
            PRIMARY KEY (`student_id`)
        ) ENGINE=InnoDB;
    ";

    $pdo->exec($sql);

    echo "Table 'student' created successfully." . PHP_EOL;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
