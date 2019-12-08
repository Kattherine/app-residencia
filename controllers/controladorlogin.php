<?php

session_start(); //poner session_start en el controlador y en el archivo session

	include_once('models/modelologin.php');
	

if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
	  /*if(isset($_SESION['login_user'])){
		header ("location: views/welcome.php");
	  }
      $row = cliente($myusername, $mypassword, $conn);*/
      
      $result = resultado($myusername, $mypassword, $conn);
      //$count = mysqli_num_rows($result);

	  //$cargo = idUsuario($myusername, $mypassword, $conn);

      if($result != 0) {
         
         $_SESSION['login_user'] = $myusername;
         //include_once('views/welcome-admin.php');
		 $_SESSION['login_user'] = $result;
		 header ("location: views/welcome?id=".$result."");
		 //header ("location: views/welcome-admin.php?id=".$cargo['id']."");
		 /*if($cargo['cargo'] == "jefe"){
			header ("location: views/welcome-admin.php");
		 } else if($cargo['cargo'] == "medico"){
			header ("location: views/welcome-medico.php");
		 } else if($cargo['cargo'] == "auxiliar"){
			header ("location: views/welcome-auxiliar.php");
		 }	*/	 
      }else {
      	$login = false;
         //$error = "Your Login Name or Password is invalid";
      }
   }


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="error"></div>
</body>
</html>
<script src="plugins/jquery.min.js"></script>
<script src="plugins/sweetalert.min.js"></script>
<script>
	
//SI EL USUARIO Y CONTRASEÑA ES ERRONEA
<?php if($login == false){ ?>
	
	  swal({
        title: "ERROR!",
        text:  "Usuario o contraseña mal introducidos",
        icon:  "error",
        timer: 2000,
    	});

<?php } ?>

</script>

