<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>學生列表</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-4 text-center">學生列表</h1>
        <?php
        require_once('config.php'); // 載入資料庫連線設定檔
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbName;
        try {
            $pdo = new PDO($dsn, $user, $pass);
            // 定義 SQL 查詢
            $query = "SELECT * FROM `student`";

            $stmt = $pdo->query($query);
            if ($stmt->rowCount() > 0) {
                echo '<div class="overflow-x-auto">';
                echo '<table class="table-auto min-w-full">';
                echo '<thead>';
                echo '<tr>';
                echo '<th class="px-4 py-2">學號</th>';
                echo '<th class="px-4 py-2">姓名</th>';
                echo '<th class="px-4 py-2">電話</th>';
                echo '<th class="px-4 py-2">班級</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    // 印出一位學生的學號、姓名、電話、班級
                    echo '<td class="px-4 py-2 text-center">' . $row['student_id'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">' . $row['name'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">' . $row['phone'] . '</td>';
                    echo '<td class="px-4 py-2 text-center">' . $row['class_name'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo "<p class='text-red-500'>沒有符合條件的記錄。</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='text-red-500'>發生錯誤： " . $e->getMessage() . "</p>";
        }
        ?>
        <div class="flex justify-center">
            <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-5">返回首頁</a>
        </div>
    </div>
</body>
</html>
