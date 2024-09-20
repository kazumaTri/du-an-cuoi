<?php
function themdm($conn, $tendm) {
    $sql = "INSERT INTO tb_danhmuc (tendm) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tendm]);
}

function updatedm($conn, $id, $tendm) {
    $sql = "UPDATE tb_danhmuc SET tendm = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tendm, $id]);
}

function getonedm($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM tb_danhmuc WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deldm($conn, $id) {
    $sql = "DELETE FROM tb_danhmuc WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

function getall_dm($conn) {
    $stmt = $conn->prepare("SELECT * FROM tb_danhmuc");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
