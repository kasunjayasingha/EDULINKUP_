<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signin</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- CSS only -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!-- Fonts-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Custom CSS -->
    <link href="CSS/style.css" rel="stylesheet" />
  </head>
  <body class="back-img">
    <div class="container-login row grid grid--1x2">
      <div class="mr-5">
        <form action="login.php" method="post">
          <h1>Login</h1>
          <div class="form-group">
            <label for="uname">Username</label>
            <input id="uname" class="usernamelogin" type="text" name="uname" required />
          </div>

          <div class="form-group">
            <label for="upass">Password</label>
            <input id="upass" type="password" name="upass" required />
          </div>
          <button class="btn" name="loginBtn" type="submit">Login</button>
        </form>
      </div>
      <div class="container-image gap-3">
        <img src="Imgs/LOGO.png" alt="" class="logo-image" />
      </div>
    </div>

    <?php
include 'includes/script.php';
?>
  </body>

</html>


