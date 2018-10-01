   <?php
   include "includes/timeout.php";
   include "includes/variables.php";
   ?>


<!doctype html>

<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <meta name="description" content="A little grid game, where you have one guess to find the Winning Box!">
    <meta property="og:title" content="PHP Grid Game"/>
    <meta property="og:description" content="A little grid game, where you have one guess to find the Winning Box!">
    <meta property="og:locale" content="en_GB"/>
    <meta property="og:locale:alternate" content="fr_FR"/>
    <meta property="og:locale:alternate" content="es_ES"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="https://www.banuscv.co.uk/PNG/gridGame.png">
    <meta property="og:image:type" content="image/png"/>


    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">



    <script type="text/javascript">
        <!--
        if ( screen.width <= 699 ) {
            document.location = "mobile/mobile.php";
        }
        //-->
    </script>

    <script language=javascript>
        <!--
        if ( ( navigator.userAgent.match( /iPhone/i ) ) || ( navigator.userAgent.match( /iPod/i ) ) ) {
            location.replace( "http://www.banuscv.co.uk/PHP Grid Game/mobile/mobile.php" );
        }
        -->
    </script>



    <title>Grid Game</title>
    <!-- mobile redirect -->




    <!--- linked css --->
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../css/fireworks.css" rel="stylesheet" type="text/css">


    <!--- variable css --->
    <?php include "includes/cssVariables.php" ?>


</head>

<body>



    <?php 
    
    //check to see if x and y variable exist
    // call user input form if not. 
    if($progress === 0){
        
        ?>
    <div class="selector">

        <div class="header">Campaign Mode</div>


        <h3>Instructions</h3>

        <ol style="text-align: left">
            <li>See how far you can go</li>
            <li>Try and Find the right Square</li>
            <li>You have 3 Attempts each Level</li>

        </ol>

        <?php include "includes/buttons.php"; ?>


    </div>



    <?php }
    
    // if variables exist show squares
            else { ?>


    <div class="float-top-right">
        <?php echo $_SESSION['lives'] ?> Lives Remaining</div>

    <h5>Level <?php echo $_SESSION['progress']; ?> </h5>


    <!--- wrap table for easy modification of where the table sits --->
    <div class="tableWrap" id="tableWrap">

        <!--- table container --->
        <table id="squares">


            <?php 
                // loop Y (down) Value to create rows
                // start row at 1 
                // if y is less than or = to row number produce a row
                // if y is greater do not produce row
                // increment y each time
                for ($y = 1; $y <= $yValue; $y++) {
                    ?>
            <tr>

                <?php 
                        // loop X (across) Value to create squares (cells)
                        // start each set of cells at 1 
                        // if X is less than or = to cell number produce a cell
                        // if C is greater do not produce cell
                        // increment X each time
                        for ($x = 1; $x <= $xValue; $x++) {
                                                
                                                    // Check if cell number is winning cell number
                                                    if($number === $randomNumber){  
                                                        //if winning cell apply winner id and clickable event
                                                        echo "<td id='winner' onclick='youWin()'></td>"; 
                                                    } else { 
                                                        
                                                        ?>

                <td class='Loser
                                                                 <?php  if($number == $_SESSION[' numberOne '] || $number == $_SESSION['numberTwo '] || $number == $_SESSION['numberThree '] ){ echo "selected"; } ?>
                                                                ' onclick='youLose(this,<?php echo $number ?>)'></td>


                <?php
                }
                //increment cell numbers
                $number++;
                }


                ?>
            </tr>

            <?php 
                                              
                    }  
                
                //table cells complete
                    ?>




        </table>

        <!-- create map div that sits behind table -->
        <div id="map"></div>

    </div>



    <?php } 
                ?>




    <!-- popup on clickable event - includes a form to play again -->
    <div class="popup">
        <!--- header and body are called dunamically from javascript win and loose events -->
        <div class="header"></div>
        <div class="body"></div>

        <!-- form contains values applied from previous round --->
        <?php include "includes/buttons.php"; ?>

    </div>

    <!-- hidden greyout that appears over game board to stop clicks --->
    <div class="greyout"></div>

    <!-- fireworks -->
    <div class="pyro">
        <div class="before"></div>
        <div class="after"></div>
    </div>



    <script>
        // declare x and y value for script
        var xValue = <?php echo $xValue ?>;
        var yValue = <?php echo $yValue ?>;
        var lives = <?php echo $_SESSION['lives'] - 1 ?>


        <?php 
            //if map is active call google map api
            if($map === "on"){ ?>

        function myMap() {
            var mapCanvas = document.getElementById( "map" );
            var mapOptions = {
                //swindon
                center: new google.maps.LatLng( 51.555775, -1.779718 ),
                zoom: 10,
                disableDefaultUI: true
            };

            var map = new google.maps.Map( mapCanvas, mapOptions );
        }

        <?php  } ?>
    </script>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUqxDbiAMFT5WOdQ1VV8cbVDg3A3wS40o&callback=myMap"></script>

    <script type="text/javascript" src="js/campaign.js"></script>


    <script src="http://code.jquery.com/jquery-latest.min.js" crossorigin="anonymous"></script>




</body>
</html>