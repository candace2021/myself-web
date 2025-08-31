<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

// MySQL 連線設定
$host = "localhost";
$dbname = "rsliksrj_removeStudio";
$username = "rsliksrj_root";
$password = "root54321%77684";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error"=>"Database connection failed"]));
}
$conn->set_charset("utf8mb4"); // 設定 UTF-8 編碼

// 取得 PATH_INFO，例如 /1
$id = 0;
if (isset($_SERVER['PATH_INFO'])) {
    $path = trim($_SERVER['PATH_INFO'], '/');
    if (is_numeric($path)) {
        $id = intval($path);
    }
}

if ($id > 0) {
    // 取得單筆作品
    $result = $conn->query("SELECT * FROM works WHERE id=$id");
    $work = $result->fetch_assoc();

    if ($work) {
        // 取得 tags
        $tags_result = $conn->query("SELECT tag FROM work_tags WHERE work_id=".$work['id']);
        $tags = [];
        while($tag_row = $tags_result->fetch_assoc()) {
            $tags[] = $tag_row['tag'];
        }
        $work['tags'] = $tags;

        echo json_encode($work);
    } else {
        http_response_code(404);
        echo json_encode(["error"=>"Work not found"]);
    }

} else {
    // 回傳全部作品
    $result = $conn->query("SELECT * FROM works");
    $works = [];
    while($row = $result->fetch_assoc()) {
        $tags_result = $conn->query("SELECT tag FROM work_tags WHERE work_id=".$row['id']);
        $tags = [];
        while($tag_row = $tags_result->fetch_assoc()) {
            $tags[] = $tag_row['tag'];
        }
        $row['tags'] = $tags;
        $works[] = $row;
    }
    echo json_encode($works);
}

$conn->close();
?>