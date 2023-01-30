<?php

@include 'config.php';
if (isset($_POST['signup'])){
   $email= mysqli_real_escape_string($conn, $_POST['email']);
   $password= md5($conn, $_POST['pass']);
   $confirmp= md5($conn, $_POST['confirmp']);
   $select = "SELECT * FROM signup WHERE email='$email' && pass='$password' ";

   $result = mysqli_query($conn, $select);
   if(mysqli_num_rows($result)!=0){
      $error[] = 'user already exist';
   }else{
      if($password!=$confirmp){
         $error[] = 'password donot match with confirm pass';
      }else{
         $insert = "INSERT INTO signup(email,password) VALUES('$email','$password')";
         mysqli_query($conn, $insert);
         header('location:login');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Signup</title>
      <link rel="stylesheet" href="static/css/signup.css">

   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            
            <div class="title signup">
               Signup Form
            </div>
         </div>
            
         <div class="form-container">
           
            <div class="form-inner">
               <form action="login" class="signup" method="POST" style="width :330px"> {% csrf_token %} 
                  <?php
                  if(isset($error)){
                     foreach($error as $error){
                        echo "ERROR";
                     };
                  };
                  ?>  
                         
                  <div class="field"> 
                 
                     <input type="email" name="email" placeholder="Email Address" required >           
                  </div>             
                  <div class="field">
                     <input type="password" name="pass" placeholder="Password" required >              
                  </div>
                  <div class="field">
                     <input type="password" name="confirmp" placeholder="Confirm password" required >              
                  </div>              
                     <div class="field btn">
                     <div class="btn-layer">

                  </div>                 
                  <input type="submit" name="signup" value="signup">
                  </div> 
               </form>
             
              
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>
