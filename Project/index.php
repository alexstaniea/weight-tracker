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
    <h1>Sign in</h1> 
      <?php
              if(isset($_SESSION['id'])){
                  header("Location: ./dashboard.php");
              }
      ?>

      <form method="POST" action="includes/login.inc.php">

              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your informations with anyone else.</small>
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">     
              <button type="submit"  id="button1" class="btn btn-primary btn-block btn-large">Sign in</button>
      
      </form>
      <a href="signup.php" id="link"><button id="button2" type="submit" class="btn btn-success btn-block btn-large">Sign up</button></a>
 </div>
 
<?php
      if(isset($_GET['info']) && $_GET['info']== 'wrong')
      {
        echo '<h1>Wrong username or password!</h1>';
      }
?>
</body>
</html>

