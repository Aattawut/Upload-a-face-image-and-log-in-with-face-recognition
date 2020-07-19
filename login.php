<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Face Recognition Login System</title>
    <?php require 'head.php'; ?>
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            background: azure;
        }

        #main-form {
            min-width: 270px;
            max-width: 350px;
        }

        #outer {
            width: 100%;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>

</head>

<body onload="init()">

    <script type="text/javascript">
        //disable back button
        history.pushState(null, null, '');
        window.addEventListener('popstate', function(event) {
            history.pushState(null, null, '');
        });
    </script>


    <?php require 'navbar.php'; ?>



    <br><br>
    <div>
        <form id="main-form" action="login.py" method="post" class="mx-auto pt-5" enctype="multipart/form-data">
            <h6 class="mb-2 text-center text-info">Face Recognition Login System </h6>
            <video onclick="snapshot(this);" width=350 height=300 id="video" controls autoplay></video>
            <br>
            <input type="email" placeholder="Enter your registered email" name="email" class="form-control form-control-sm mb-2" autocomplete=off required>

            <input type="text" accept="image/png" hidden name="current_image" id="current_image">

            <button onclick="login()" class="btn btn-primary btn-sm d-block w-25 mx-auto mt-4" value="login">ตกลง </button>
            <button onclick="location.href = 'upload_image.php'" ; class="btn btn-primary btn-sm d-block w-25 mx-auto mt-4">ยกเลิก </button>

            <br>
            <br>
        </form>
    </div>
    <canvas id="myCanvas" width="400" height="350" hidden></canvas>
    <script>
        alert('!ข้อเเนะนำ โปรดอยู่ในที่ที่มีเเสงเพียงพอเเละให้ใบหน้าของคุณอยู่ในกรอบ เเล้วคลิก->ตกลง !!หากไม่สามารถเข้าระบบได้ให้ คลิก->ยกเลิก เพื่อย้อนกลับไปยังหน้าอัพโหลดรูปภาพของคุณ')
    </script>

</body>

<script>
    //--------------------
    // GET USER MEDIA CODE
    //--------------------
    navigator.getUserMedia = (navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia);

    var video;
    var webcamStream;
    if (navigator.getUserMedia) {
        navigator.getUserMedia(

            // constraints
            {
                video: true,
                audio: false
            },

            // successCallback
            function(localMediaStream) {
                video = document.querySelector('video');
                video.srcObject = localMediaStream;
                webcamStream = localMediaStream;
            },

            // errorCallback
            function(err) {
                console.log("The following error occured: " + err);
            }
        );
    } else {
        console.log("getUserMedia not supported");
    }



    var canvas, ctx;

    function init() {
        // Get the canvas and obtain a context for
        // drawing in it
        mcanvas = document.getElementById("myCanvas");
        ctx = mcanvas.getContext('2d');
    }

    function login() {
        // Draws current image from the video element into the canvas
        ctx.drawImage(video, 0, 0, mcanvas.width, mcanvas.height);
        var dataURL = mcanvas.toDataURL('image/png');
        document.getElementById("current_image").value = dataURL;

    }
</script>
<?php require 'footer.php'; ?>

</html>