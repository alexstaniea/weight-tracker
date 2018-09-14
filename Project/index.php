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

  <div class="jumbotron">
    <h1 id="title">Bootstrap Tutorial</h1> 
    <p id="subtitle">Sign in</p> 
  </div>


<?php
        if(!isset($_SESSION['id'])){
            header("Location: ./dashboard.php");
        }
?>

<form method="POST" action="includes/login.inc.php">
    <div class="container">
      <div class="form-group ">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your informations with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
</form>



<?php
      if(isset($_GET['info']) && $_GET['info']== 'wrong')
      {
        echo '<h1>Wrong username or password!</h1>';
      }
?>
</body>
</html>

