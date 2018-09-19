<?php
   session_start();

?>

<!DOCTYPE html>
<head>
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
</head>
<body>

<div class="container-fluid">

    <?php  
        echo '<h2 id="text">Hello, '.$_SESSION['username'].'</h2>';
    ?>

    <form method="POST"  action="includes/dashboard.inc.php">
        <?php
            if(!isset($_GET['info'])){
                echo'
                <h3 id="text2">What is your weight today?</h3>
                <input id="thekg" name="weight" type="text" required>
                <select  id="selector">
                    <option value="kg">kg</option>
                    <option value="kg">lbs</option>
                </select>
            
                <button type="submit" class="btn btn-primary lol ">Enter</button>';
            }
        ?>
    </form>

    <form  action="includes/logout.inc.php">
        <button class="btn btn-danger" style="margin-top:-36.65%;  margin-left:90.65%;">Log out</button>
    </form>

    <?php
        require 'includes/connect.php';

        if(isset($_GET['info'])=='ready')
        {
            echo '
            <form  action="includes/logout.inc.php">
                <button class="btn btn-danger" style="position:absolute;  margin-top:-8.6%; margin-left:89.25%;">Log out</button>
            </form>
            <div class=container> <canvas style="margin-top:5%;" id="myChart"></canvas> </div>';
        }
    ?>

</div>

<script>
    var myChart = document.getElementById('myChart').getContext('2d');

    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 16;
    Chart.defaults.global.defaultFontColor = '#777';


    var weightchart = new Chart(myChart,{
        type:'bar',
        data:{
            labels:[
            
            <?php
                    require 'includes/connect.php';

                    if(isset($_GET['info'])=='ready')
                    {
                        $id = $_SESSION['id'];

                        $sql = "SELECT weight,value FROM dates WHERE userid='$id'";
                        $result = mysqli_query($connect, $sql);

                        while($row = $result->fetch_array()) {
                            echo "'".$row['value']."', "; 
                        }
                    }
                ?>

            ],
            datasets:[{
                label:'weight',
                data:[
                <?php
                    require 'includes/connect.php';

                    if(isset($_GET['info'])=='ready')
                    {
                        $id = $_SESSION['id'];

                        $sql = "SELECT weight,value FROM dates WHERE userid='$id'";
                        $result = mysqli_query($connect, $sql);

                        while($row = $result->fetch_array()) {
                            echo $row['weight'].','; 
                        }
                    }
                ?>
            ],
            backgroundColor:[
                <?php
                    require 'includes/connect.php';

                    if(isset($_GET['info'])=='ready')
                    {
                        $id = $_SESSION['id'];

                        $sql = "SELECT weight,value FROM dates WHERE userid='$id'";
                        $result = mysqli_query($connect, $sql);

                        while($row = $result->fetch_array()) {
                            echo "'rgba(21, 213, 139, 0.52)',"; 
                        }
                    }
                ?>

            ],
            borderWidth:1,
            borderColor:'#777',
            hoverBorderWidth:3,
            hoverBorderColor:'#000'
          }]
        },
        options:{
            title:{
                display:true,
                text:'Your weight progress',
                fontSize:25
            },
            legend:{
                position:'right',
                labels:{
                    fontColor:'#000'
                }
                
            }
        }
    });

</script>

</body>
</html>