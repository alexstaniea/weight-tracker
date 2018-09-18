<?php
   session_start();

?>

<!DOCTYPE html>
<head>
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>


<?php  
        echo '<h2 id="text">Hello, '.$_SESSION['username'].'</h2>';
 ?>



<form method="POST"  action="includes/dashboard.inc.php">

    <?php
    if(!isset($_GET['info'])){
        echo'
        <h3 id="text2">What is your weight today?</h3>
        <input id="thekg" name="weight" type="text">
        <select  id="selector">
            <option value="kg">kg</option>
            <option value="kg">lbs</option>
        </select>
    
    <button type="submit" class="btn btn-primary lol ">Enter</button>'; 
    }

    ?>
</form>

<form  action="includes/logout.inc.php">
    <button class="btn btn-danger" style="margin-left:93%;margin-top:-40%;">Log out</button>
</form>

<?php

   require 'includes/connect.php';

   $id = $_SESSION['id'];

   $sql = "SELECT weight,value FROM dates WHERE userid='$id'";
   $result = mysqli_query($connect, $sql);

   while($row = $result->fetch_array()) {
    echo '<p style="color:white; text-align:center; margin-top:10px; font-size:20px">You weighed '.$row['weight'].' kg on '.$row['value'].'</p></br>'; 
   }
?>



</body>
</html>

