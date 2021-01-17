<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style2.css">
  <title>Chat</title>
</head>

<body>

<?php
if($_SESSION['loggedin'] && $_SESSION['loggedin']==true){
  echo'<div class="name_container">
  <h1>
  <span style="float:left;"><img src="' . $_SESSION['pic'] . '" style="height:50px;width:50px;object-fit:cover;border-radius:50%;margin-right:10px;display:inline;">' . $_SESSION['username'].'
  </span>
  <span style="float:right;margin-top:31px;font-size:15px;"><a href="logout.php" style="color:white;">Logout</a></span>
  </h1>
  </div> 
  <hr>';

}
else{
  echo'<div class="name_container">
  <h1>
 Welcome to Our
  </h1>
  </div> 
  <hr>';
}
 
?>

  <?php
  
  if (isset($_GET['loginsuccess']) == true) {
    echo '<div id="mydiv" style="text-align:center;color:green;font-weight:bold;font-size:20px;">Login Successful</div>
    <script>
    setTimeout(fade_out, 2000);

    function fade_out() {
      $("#mydiv").fadeOut().empty();
    }
    </script>';
  }


  ?>
  <?php
  if($_SESSION['loggedin'] && $_SESSION['loggedin']==true){
    echo' <div class="form_container">
    
    <div class="chat_container"><p class="chat_content"></p></div>

    <form class="insert_message" >
      <textarea name="message" id="message" cols="10" rows="5" placeholder=" Write Your Message:" style="width: 70%; border-radius:10px;margin-top:10px;padding:10px;"></textarea>
   <a href="#" id="submit" name="submit"><img src="send.png" style="height:30px;width:30px;"></a><br>
      <input type="hidden" id="sn" name="sn" value=" '.$_SESSION['sn'].'">

    </form>

  </div>';
  
}



?>


  <script>
    $(document).ready(function() {
  
      // Receiving the message in REAL TIME
      window.setInterval(function() {
      
        // Prevents dissappearing contents while refreshing
        readMessage();
      }, 1000);


    })


    function readMessage() {
      var readMessage = 'readMessage';
      $.ajax({
        url: 'chatHandle.php',
        type: 'POST',
        data: {
          readMessage: readMessage,

        },
        success: function(data, result) {
          $('.chat_content').html(data);
          

        }
      });
    }
var sound = new Audio('received_message_msn.mp3');
    $('#submit').click(function() {
      $("html, body").animate({ scrollTop: $(document).height() }, "slow");
      var message = $('#message').val();
      message = message.replace("'","`")
      var sn = $('#sn').val();
      $.ajax({
        url: 'chatHandle.php',
        type: 'POST',
        data: {
          message: message,
          sn: sn,
        },
        success: function(data, result) {
          readMessage();
          var message = $('#message').val('');
          sound.play();
       



        }
      });
    });
  </script>


</body>

</html>
