<?php
   session_start();
?>


<!DOCTYPE html>
<head>
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="style/signup.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

  <div class="login">
      <h1 style="margin-bottom:20%; margin-top:-15%;">Sign up</h1>  
      <form method="POST" action="includes/signup.inc.php">
        
              <label for="exampleInputEmail1" style="color:lightgray">Email address</label>
              <input type="email" name="email" class="form-control" style="margin-bottom:10%" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <label for="exampleInputPassword1" style="color:lightgray">Password</label>
              <input type="password" name="password" class="form-control" style="margin-bottom:10%" id="exampleInputPassword1" placeholder="Password">
              <label for="usrnm" style="color:lightgray">Username</label>
              <input type="text" name="username" class="form-control" id="usrnm" placeholder="Username">
            <button type="submit" style="margin-top:9%" class="btn btn-success btn-block btn-large">Sign up</button>

      </form>

      <a href="index.php" > <button style="margin-top:9%"  class="btn btn-primary btn-block btn-large">Sign in</button> </a>
  </div>

<?php
      if(isset($_GET['info']) && $_GET['info']== 'ok')
      {
        echo '<h1>Account successfully created!</h1>';
      }
      else if(isset($_GET['info']) && $_GET['info']== 'error'){
            echo '<h1 id="missing">There are empty fields!</h1>';
      }
      else if(isset($_GET['info']) && $_GET['info']== 'exist'){
            echo '<h1  id="existing">This email already has an account!</h1>';
      }
?>


</body>
</html>

