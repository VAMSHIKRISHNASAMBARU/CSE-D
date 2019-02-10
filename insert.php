<html>
<head>
<title>SUCCESS</title>
<link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>

<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "year";
 
//Creating connection for mysqli
 
$conn = new mysqli($server, $user, $pass, $dbname);
 
//Checking connection
 
if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}
$rno = mysqli_real_escape_string($conn, $_POST['rno']);
$studentname = mysqli_real_escape_string($conn, $_POST['Name']);

$email = mysqli_real_escape_string($conn, $_POST['EMail']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$branch = mysqli_real_escape_string($conn, $_POST['country']);

$eventname = mysqli_real_escape_string($conn, $_POST['ename']);

$sql = "INSERT INTO registration (rollno,name,email,mobile,branch,eventname) VALUES( '$rno','$studentname', '$email','$mobile', '$branch','$eventname')";
if($conn->query($sql) === TRUE){
 echo "Record Added Sucessfully";
}
else
{
 echo "Error" . $sql . "<br/>" . $conn->error;
}
 $conn->close();
?>
<br>
<a href="index.html"><button class="btn"><font color="black">BACK TO HOME PAGE</font></button></a>
</body>
</html>