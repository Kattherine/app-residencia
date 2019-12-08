<?php

	include_once("db/config.php");
	include_once('controllers/controladorlogin.php');
   
?>
<html>
   
   <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

 <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="plugins/bootstrap.min.css">
	 <script defer src="plugins/all.js"></script>
    
      <title>Pagina de Login</title>
      
      <style type = "text/css">
         html, body {
		  height: 100%;
		}

		body {
		  display: -ms-flexbox;
		  display: -webkit-box;
		  display: flex;
		  -ms-flex-align: center;
		  -ms-flex-pack: center;
		  -webkit-box-align: center;
		  align-items: center;
		  -webkit-box-pack: center;
		  justify-content: center;
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #f5f5f5;
		}

		.form-signin {
		  width: 100%;
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .checkbox {
		  font-weight: 400;
		}
		.form-signin .form-control {
		  position: relative;
		  box-sizing: border-box;
		  height: auto;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
      </style>
	
   </head>
   
   <!--<body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = " " method = "post">
                  <label>Usuario  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Contraseña  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>-->
   
   <body class="text-center">
    <form class="form-signin" method = "post">
      <!--<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      
       <div class="input-group form-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-user"></i></span>
			</div>
			<input type="text" name="username" class="form-control" placeholder="Usuario">
		</div>
		
		<div class="input-group form-group">
			<div class="input-group-prepend" style="height: 46px;">
				<span class="input-group-text"><i class="fas fa-key"></i></span>
			</div>
			<input type="password" name="password" class="form-control" placeholder="Contraseña">
		</div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="enviar">Entrar</button>
    </form>
  

	</body>
   
</html>

