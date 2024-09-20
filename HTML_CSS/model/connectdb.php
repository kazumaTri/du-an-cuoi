<?php
function connectdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hoc_lap_trinh";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Kết nối thất bại: " . $e->getMessage());
    }
    return $conn;
}
?>
