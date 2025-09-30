<?php 

$admin_id='';
$email='';
$password='';

$errors=array();

$db = new mysqli('localhost','root','','renthouse');

if($db->connect_error){
	echo "Error connecting database";
}

if(isset($_POST['admin_login'])){
	admin_login();
}


function admin_login(){
	global $email, $db;

    $email    = validate($_POST['email']);
    $password = validate($_POST['password']);

    $stmt = $db->prepare("SELECT password FROM admin WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashFromDb);
    $stmt->fetch();
    $stmt->close();

    if ($hashFromDb && password_verify($password, $hashFromDb)) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: admin/admin-index.php');
    

		}
		else{
			
?>

<style>
.alert {
  padding: 20px;
  background-color: #DC143C;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<div class="container">
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Incorrect Email/Password or you are not registered as admin.</strong>
</div></div>


<?php
		}
}


function validate($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}



 ?>