<?php
include "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <title>MyNewChat</title>
</head>

<body>
    <h1>Welcome to <strong>OUR CHAT</strong></h1>
    <hr>
    <div class="form_container">

    <form  action="signupHandle.php" method="POST" enctype="multipart/form-data">
        Select your profile picture: <br>
        <input type="file" id="file" name="file">
        Username:<br>
        <input type="text" name="username" placeholder="Username" id="username"><br>
        Password:<br>
        <input type="text" name="password" placeholder="Password" id="password"><br>
        Confirm Password:<br>
        <input type="text" name="cpassword" placeholder="Confirm Password" id="cpassword"><br>
        <input type="submit" name="submit" value="Signup" id="submit"><br>

    </form>
    <span style="color:brown;font-size:12px;margin-top:20px;">Already have an account? <a href="login.php">Login</a> here</span>
    </div>
    

    <!-- <h2 id="write"></h2> -->

    <!-- <script>
        function uploadImage(){
            fetch('signupHandle.php',{
                method:'POST',
                body: new FormData(document.querySelector('#frm'))
            })
        }

        $('#submit').click(function() {
            uploadImage();
            var uname = $('#username').val();
            var pass = $('#password').val();
            var cpass = $('#cpassword').val();
         
            $.ajax({
                url: 'signupHandle.php',
                type: 'POST',
                data: {
                    u: uname,
                    p: pass,
                    c: cpass,
                  
                },
                success: function(data,result) {
                    alert("Successfully Sent Data");
                
                    // $('#write').html(data);
                    window.location.href = 'login.php';
                }
            });
        });
    </script> -->
</body>

</html>