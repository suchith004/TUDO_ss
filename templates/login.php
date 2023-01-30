<?php

@include 'config.php';
if (isset($_POST['login'])){
   $email= mysqli_real_escape_string($conn, $_POST['email']);
   $password= md5($conn, $_POST['pass']);

   $select = "SELECT * FROM signup WHERE email='$email' && pass='$password' ";

   $result = mysqli_query($conn, $select);
   
};


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login/Registration</title>
      <link rel="stylesheet" href="static/css/login.css">

   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
           
            <div class="form-inner">
               <form action="homepage" class="login">  {% csrf_token %}
                  <div class="field">
                     <input type="email" placeholder="Email Address" required name="email">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required name="password">
                  </div>
                  <div class="pass-link">
                     <a href="forgotpassword">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="signup">Signup now</a>
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
