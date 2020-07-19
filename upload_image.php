<!DOCTYPE html>
<html>

<head>
    <?php require 'head.php'; ?>
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            background: azure;
        }

        * {
            font-size: 0.93rem;
        }
    </style>
</head>

<body class="d-flex pt-5 px-3">

    <?php require 'navbar.php'; ?>

    <form action="upload_image.php" enctype="multipart/form-data" class="mx-auto pt-5" method="post">
        <div>

            <h6 class="mb-4 text-center text-info">อัพโหลดภาพใบหน้าของคุณ เพื่อใช้ในการยืนยันตัวตนด้วยใบหน้า</h6>
            <input type="file" name="file"><br><br>
            <input type="text" name="filename" placeholder="โปรดตั้งชื่อรูปภาพให้เหมือนอีเมลล์ที่ใช้สมัคร" class="form-control form-control-sm mb-4" autocomplete=off>

            <button type="submit" name="Submit1" class="btn btn-primary btn-sm d-block w-25 mx-auto mt-4">อัพโหลด</button>
            <a href="login.php" class="btn btn-info btn-sm d-block w-25 mx-auto mt-4">ตกลง</a>
        </div>
    </form>

    <?php
if(isset($_POST['Submit1']))
{ 

$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
$name = $_POST["filename"]; //ชื่อไฟล์ใหม่ถูกเก็บในตัวเเปร name
$newname = $name.".".$extension; //เปลี่ยนชื่อไฟล์

$target = 'images/'.$newname; //ที่เก็บไฟล์ที่ต้องการ

move_uploaded_file($_FILES["file"]["tmp_name"], $target);

}
?>
    <?php require 'footer.php'; ?>

</body>

</html>