<?php 
include "dbconnect.php";
if(isset($_POST['message'])){
    $msg = $_POST['message'];
    $sn = $_POST['sn'];

    $sql = "INSERT INTO `chatpage`( `content`, `chat_user_id`, `date`) VALUES ('$msg','$sn',current_timestamp())";
    $result = mysqli_query($con,$sql);
  
    
}
?>
<?php
session_start();
if(isset($_POST['readMessage'])){
$sql1 = "SELECT * FROM `chatpage`";
$res = mysqli_query($con,$sql1);
while($row = mysqli_fetch_assoc($res)){
    $serialBy = $row['chat_user_id'];
    $content = $row['content'];
    



    $sql2 = "SELECT * FROM `users` WHERE `id`='$serialBy'";
    $res2 = mysqli_query($con,$sql2);
    $rowUser = mysqli_fetch_assoc($res2);
    $name = $rowUser['username'];
    $pic = $rowUser['pic'];

    if($name == $_SESSION['username']){
        echo '<div class="chat_div" style="display:flex;margin-top:10px; background:white; width:50%;float:left;padding:10px;margin:10px;border-radius:5px;">
    
        <img src="'.$pic.'" style="height:50px;width:50px;object-fit:cover;border-radius:50%;">
        <div style="background:lightblue; width:100%;margin-left:20px;padding:20px;border-radius:10px;">
        
     
        Sent by  <strong>You</strong><hr><br>
        '.$content. ' <span style="float:right;font-size:10px;margin-top:40px;">at '.$row['date'].'</span>
        </div>
        </div>';
    }
    else{
        echo '<div class="chat_div" style="display:flex;margin-top:10px; background:white; width:50%;float:right;padding:10px;margin:10px;border-radius:5px;">
    
        <img src="'.$pic.'" style="height:50px;width:50px;object-fit:cover;border-radius:50%;">
        <div style="background:#cccccc; width:100%;margin-left:20px;padding:20px;border-radius:10px;">
        
     
        Sent by  <strong>'.$name.'</strong><hr><br>
        '.$content. ' <span style="float:right;font-size:10px;margin-top:40px;">at '.$row['date'].'</span>
        </div>
        </div>';
    }
 
   
}

}


// Displaying messages
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
    // echo"Hellow";
    
    // }
    



?>