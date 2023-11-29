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
        require_once('config.php');
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbName;

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $query = "SELECT * FROM `student`";
            $stmt = $pdo->query($query);
        } catch (PDOException $e) {
            echo "<p class='text-red-500'>發生錯誤： " . $e->getMessage() . "</p>";
            exit;
        }
        ?>

        <?php if ($stmt->rowCount() > 0): ?>
            <div class="overflow-x-auto">
                <table class="table-auto min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">學號</th>
                            <th class="px-4 py-2">姓名</th>
                            <th class="px-4 py-2">電話</th>
                            <th class="px-4 py-2">班級</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td class="px-4 py-2 text-center"><?= $row['student_id'] ?></td>
                                <td class="px-4 py-2 text-center"><?= $row['name'] ?></td>
                                <td class="px-4 py-2 text-center"><?= $row['phone'] ?></td>
                                <td class="px-4 py-2 text-center"><?= $row['class_name'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class='text-red-500'>沒有符合條件的記錄。</p>
        <?php endif; ?>

        <div class="flex justify-center">
            <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-5">返回首頁</a>
        </div>
    </div>
</body>
</html>
