<?php
require_once("dbconfig.php");

if ($_POST){
    $doc_num = $_POST['doc_num'];
    $doc_title = $_POST['doc_title'];
    $doc_start_date = $_POST['doc_start_date'];
    $doc_to_date = $_POST['doc_to_date'];
    $doc_status = $_POST['doc_status'];
    $doc_file_name = $_POST['doc_file_name'];

    $sql = "INSERT 
            INTO documents (doc_num, doc_title) 
            VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssss", $doc_num, $doc_title, $doc_start_date, $doc_to_date, $doc_status, $doc_file_name);
    $stmt->execute();

    header("location: doc.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Documents</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Add Documents</h1>
        <form action="newactor.php" method="post">
            <div class="form-group">
                <label for="doc_num">เลขที่คำสั่ง</label>
                <input type="text" class="form-control" name="doc_num" id="doc_num">
            </div>
            <div class="form-group">
                <label for="doc_title">ชื่อคำสั่ง</label>
                <input type="text" class="form-control" name="doc_title" id="doc_title">
            </div>
            <div class="form-group">
                <label for="doc_start_date">วันที่เริ่มต้นคำสั่ง</label>
                <input type="text" class="form-control" name="doc_start_date" id="doc_start_date">
            </div>
            <div class="form-group">
                <label for="doc_to_date">วันที่สิ้นสุด</label>
                <input type="text" class="form-control" name="doc_to_date" id="doc_to_date">
            </div>
            <div class="form-group">
                <label for="doc_status">สถานะ</label>
                <SELECT>
                    <OPTION SELECTED>---สถานะ---
                    <OPTION VALUE=1>Active
                    <OPTION VALUE=2>Expire
                </SELECT>
            </div>
            <div class="form-group">
                <label for="doc_file_name">ชื่อไฟล์เอกสาร</label>
                <input type="text" class="form-control" name="doc_file_name" id="doc_file_name">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
</body>

</html>