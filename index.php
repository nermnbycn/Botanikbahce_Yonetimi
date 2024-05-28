<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding:0;
        }
        .container1{
    background-image: url(backgorund.jpg);
    background-position: center;
    background-repeat: no-repeat;
    width:100%;
    background-size: cover;
    height:100vh;
    }
    .register-container{
      background-color:rgba(92, 107, 45, 0.7);
      display:flex;
      align-items:center;
      justify-content:center;
      width:50%;
      height:300px;
      margin-left:25%;
      margin-top:5%;
    }
    .login-container{
      background-color:rgba(92, 107, 45, 0.7);
      display:flex;
      align-items:center;
      justify-content:center;
      width:50%;
      height:300px;
      margin-left:25%;
      margin-top:5%;
    }
   
    </style>
</head>
<body>
    <div class="container1">
    <div class="d-flex justify-content-evenly"> <!--Butonlar-->
        <button type="button" class="btn btn-light mt-5 fw-bolder yazi" id="Register">Kayıt Ol</button>
        <button type="button" class="btn btn-light mt-5 fw-bolder yazi" id="Login">Giriş Yap</button>
      </div>
        <div class="register-container d-none text-white fw-bolder">
            <form method="post" action="kayit.php">
            <div class="mb-2">
              <label for="username">Kullanıcı Adı:</label>
              <input type="text" id="username" name="username">
            </div> 
            <div class="mb-2">
              <label for="password">Şifre:</label>
              <input type="password" id="password" name="password">
            </div> 
            <button type="submit" class="btn btn-light mt-3 fw-bolder yazi px-5">Kayıt Ol</button>
            </form>
        </div>
   

    <div class="login-container d-none text-white fw-bolder">
            <form method="post" action="login.php">
            <div class="mb-2">
              <label for="username">Kullanıcı Adı:</label>
              <input type="text" id="username" name="username">
            </div> 
            <div class="mb-2">
              <label for="password">Şifre:</label>
              <input type="password" id="password" name="password">
            </div> 
            <button type="submit" class="btn btn-light mt-3 fw-bolder yazi px-5">Giriş Yap</button>
            </form>
        </div>

        </div>

<script>
    document.getElementById("Register").addEventListener("click", function() {
        document.querySelector(".register-container").classList.remove("d-none");
        document.querySelector(".login-container").classList.add("d-none");
    });

    document.getElementById("Login").addEventListener("click", function() {
        document.querySelector(".login-container").classList.remove("d-none");
        document.querySelector(".register-container").classList.add("d-none");
    });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-Ey6jl5czIg49K8gcv2r74bTc2ZwsQ9lJhZwSpxvG+gEn4+HgjWl0LSFsaSiVGM1z" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-Uixc8z/+fGTICVeJhfvwqTJ4zQa2Zy9RAwxpg8R9HZxENYHbCxOcym8/whq8jynW" crossorigin="anonymous"></script>
</body>
</html>


 

