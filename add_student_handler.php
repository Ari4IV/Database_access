<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<?php
$stdName = $_POST['std_name'];
$phone = $_POST['phone'];
$className = $_POST['class_name'];

//作業:在此宣告$query變數的內容（SQL指令)
$query = "INSERT INTO `student` (`student_id`, `name`, `phone`, `class_name`) VALUES (NULL, '$stdName', '$phone', '$className')";

$host = 'localhost'; //Database所在主櫟
$dbName = 'db_course'; //資料庫名稱
$user = ''; //連線帳號
$pass = ''; //連線密碼
$dsn = "mysql:host=" . $host . ";dbname=" . $dbName;

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->query($query);
    echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">新增完成. <a href="student_list.php" class="text-blue-500 hover:text-blue-700">學生列表</a></span>
        </div>';
} catch (PDOException $e) {
    echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">發生錯誤：' . $e->getMessage() . '</span>
        </div>';
}
?>
