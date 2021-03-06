<?php
   session_start();
?>

<!DOCTYPE html>
<head>
    <title>Sign in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
<div class="wrapper">
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3 id="sidebartitle">Menu</h3>
            </div>

            <ul class="list-unstyled ">
                <li class="active">
                    <a href="dashboard.php" >Home</a>
                </li>
            </ul>

            <ul class="list-unstyled">
                <li class="active">
                    <a href="dashboard.php?info=ready">View progress</a>
                </li>
            </ul>

            <ul class="list-unstyled">
                <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse">Edit entry</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li class="active">
                                <a href="enter.php">Add specific entry</a>
                            </li>
                            <li class="active">
                                <a href="delete.php">Delete entry</a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </nav>


    <div class="container-fluid" id="content">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-justify fa-3x"></i>
        </button>

        <?php  
            echo '<h2 id="text">Hello, '.$_SESSION['username'].'</h2>';
        ?>

       
        <?php
            require 'includes/connect.php';

            if(!isset($_GET['info'])){
                echo'
                <h3 id="text2">What is your weight today?</h3>
                <form method="POST"  action="includes/dashboard.inc.php">
                    <input id="thekg" name="weight" type="text" required>
                    <select  id="selector">
                        <option value="kg">kg</option>
                        <option value="kg">lbs</option>
                    </select>                    
                    <button type="submit" class="btn btn-primary  lol" style=" font-size:20px;">Enter</button>
                </form>

                <form  action="includes/logout.inc.php">
                    <button class="btn btn-danger" style="margin-top:-50.47%; font-size:15px;  margin-left:91.2%;">Log out</button>
                </form>';
            }else if(isset($_GET['info'])=='ready')
            {
                echo '
                <form  action="includes/logout.inc.php">
                    <button class="btn btn-danger" style="position:absolute; font-size:15px; margin-top:-14.6%; margin-left:89.25%;">Log out</button>
                </form>
                <div class=container> <canvas style="margin-top:2%;" id="myChart"></canvas> </div>';
            }
       
        ?>
    </div>
</div>

<div class="overlay"></div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<script>
    var myChart = document.getElementById('myChart').getContext('2d');

    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 16;
    Chart.defaults.global.defaultFontColor = '#777';


    var weightchart = new Chart(myChart,{
        type:'line',
        data:{
            labels:[
            
            <?php
                    require 'includes/connect.php';

                    if(isset($_GET['info'])=='ready')
                    {
                        $id = $_SESSION['id'];

                        $sql = "SELECT weight,value FROM dates WHERE userid='$id' ORDER BY value";
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

                        $sql = "SELECT weight,value FROM dates WHERE userid='$id' ORDER BY value";
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