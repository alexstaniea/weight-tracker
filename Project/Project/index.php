<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

  <div class="login">
  
    <h1 style="margin-bottom:20%; margin-top:-7%;">Sign in</h1> 
      <form method="POST" action="includes/login.inc.php">

              <label for="exampleInputEmail1" style="color:lightgray;">Email address</label>
              <input type="email" name="email" class="form-control" style="margin-bottom:10%" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <label for="exampleInputPassword1" style="color:lightgray">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">     
              <button type="submit"  id="button1" style="margin-top:9%" class="btn btn-success btn-block btn-large">Sign in</button>
      
      </form>
      <a href="signup.php" id="link"><button id="button2" style="margin-top:9%"  type="submit" class="btn btn-primary btn-block btn-large">Sign up</button></a>
 </div>
 
<?php
      if(isset($_GET['info']) && $_GET['info']== 'wrong')
      {
        echo '<h1 id="wrong">Wrong username or password!</h1>';
      }else if(isset($_GET['info']) && $_GET['info']== 'missing')
      {
        echo '<h1 id="missing">Enter your username and password!</h1>';
      }
?>
</body>
</html>

