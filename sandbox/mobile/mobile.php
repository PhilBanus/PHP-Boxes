   <?php

   // define variables from submited form
   //get boxes going across
   $xValue = $_GET[ 'X' ];
   //get boxes going down
   $yValue = $_GET[ 'Y' ];
   //get map on or off
   $map = $_GET[ 'Map' ];

   //generate a random number for winning square
   $randomNumber = rand( 1, $xValue * $yValue );
   //set number of first cell
   $number = 1;

   //calculate even cell width and heights i.e. 100/5 = 20 (%)
   $cellWidth = floor( 100 / $xValue );
   $cellHeight = floor( 100 / $yValue );

   //make squares by changing the height or width of the table ie. 10*40/2 = 200
   //set width default
   $width = $cellHeight * $xValue * 1.5;
   //margin left calculated by 100% - width / 2 (100 -50%) = (50%)/2 = 25% either side 

   $height = 100;

   //make an exception when calculated width is greater than 100 vary the height instead. 
   if ( $width > 100 ) {
       $height = $cellWidth * $yValue / 1.5;
       $width = 100;
       $left = 0;
   }

   // this should create nice even boxes most of the time. there are exceptions when one value is massivly greater than the other (100+)


   $left = ( 100 - $width ) / 2;
   $top = ( 100 - $height ) / 2;
   ?>


<!doctype html>

<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="pragma" content="no-cache"/>


    <meta name="description" content="A little grid game, where you have one guess to find the Winning Box!">
    <meta property="og:title" content="PHP Grid Game"/>
    <meta property="og:description" content="A little grid game, where you have one guess to find the Winning Box!">
    <meta property="og:locale" content="en_GB"/>
    <meta property="og:locale:alternate" content="fr_FR"/>
    <meta property="og:locale:alternate" content="es_ES"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="https://www.banuscv.co.uk/PNG/gridGame.png">
    <meta property="og:image:type" content="image/png"/>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">




    <title>Grid Game</title>


    <!--- linked css --- variable css is inline --->
    <link href="../../css/mobile.css" rel="stylesheet" type="text/css">
    <link href="../../css/fireworks.css" rel="stylesheet" type="text/css">


    <!--- variable css --->
    <style>
        /* hide body then fade in once elements are loaded */
        
        body {
            display: none;
        }
        
        <?php // check for map activation then apply variabled css for map setting
        if($map==="on") {
            ?> table,
            #map {
                width: <?php echo $width ?>% !important;
                height: <?php echo $height ?>% !important;
                border-spacing: 1%;
                top: <?php echo $top ?>%;
                left: <?php echo $left ?>%;
                border-collapse: collapse;
                transform-origin: top center;
                position: absolute;
            }
            #map {
                z-index: 1
            }
            table {
                z-index: 2
            }
            tr {
                height: <?php echo $cellHeight ?>% !important;
                width: 100% !important;
                background: transparent !important;
            }
            td {
                height: <?php echo $cellHeight ?>% !important;
                width: <?php echo $cellWidth ?>%;
                position: relative;
                background: transparent;
                border: 1px green solid !important;
            }
            <?php
        }
        
        //set variables for no map
        else {
            ?> table {
                width: <?php echo $width ?>% !important;
                height: <?php echo $height ?>% !important;
                border-spacing: 1%;
                top: <?php echo $top ?>%;
                left: <?php echo $left ?>%;
                border-collapse: separate;
                transform-origin: top center;
                position: absolute;
                background: white;
            }
            #map {
                z-index: 1
            }
            table {
                z-index: 2
            }
            tr {
                height: <?php echo $cellHeight ?>% !important;
                width: 100% !important;
            }
            td {
                height: <?php echo $cellHeight ?>% !important;
                width: <?php echo $cellWidth ?>%;
                position: relative;
                background: royalblue;
            }
            <?php
        }
        
        ?>
        /* display winner for testing 
        #winner{
            background: rgba(0,0,0,0.1) !important
        }
       
     */
    </style>


</head>

<body>



    <?php 
    
    //check to see if x and y variable exist
    // call user input form if not. 
    if(!$xValue || !$yValue){
        
        ?>
    <div class="selector">

        <div class="header">Welcome</div>


        <h3>Instructions</h3>

        <ol style="text-align: left">
            <li>Choose an accross value (x)</li>
            <li>Choose a down value (y)</li>
            <li>Select Map mode (if you want)</li>
            <li>Try to find the winning square in one guess!</li>

        </ol>



        <form action="" method="get">

            <label for="X">Please choose a number of boxes going across:</label>
            <br>
            <!-- set to maximum 100 for load speed and rendering -->
            <input type="number" name="X" class="form-control" min="1" max "100" placeholder="7" required>
            <br>
            <label for="Y">Please choose a number of boxes going down:</label>
            <br>
            <input type="number" name="Y" class="form-control" min="1" max "100" placeholder="5" required>
            <br>
            <label for="map">Map? <input type="checkbox" name="Map"></label>
            <br>

            <input type="submit" class="btn" value="Play!">

        </form>


    </div>



    <?php }
    
    // if variables exist show squares
            else { ?>

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
                for ($y = 1; $y <= $_GET['Y']; $y++) {
                    ?>
            <tr>

                <?php 
                        // loop X (across) Value to create squares (cells)
                        // start each set of cells at 1 
                        // if X is less than or = to cell number produce a cell
                        // if C is greater do not produce cell
                        // increment X each time
                        for ($x = 1; $x <= $_GET['X']; $x++) {
                                                
                                                    // Check if cell number is winning cell number
                                                    if($number === $randomNumber){  
                                                        //if winning cell apply winner id and clickable event
                                                        echo "<td id='winner' onclick='youWin()'></td>"; 
                                                    } else { 
                                                        //if losing cell apply losing class and event
                                                        echo "<td class='Loser' onclick='youLose(this)'></td>"; 
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
        <form action="" method="get">
            <legend>Try Again</legend>

            <label for="X">Please choose a number of boxes going across:</label>
            <br>
            <input type="number" name="X" value="<?php echo $xValue ?>" class="form-control" min="1" max "100" required>
            <br>
            <label for="Y">Please choose a number of boxes going down:</label>
            <br>
            <input type="number" name="Y" value="<?php echo $yValue ?>" class="form-control" min="1" max "100" required>
            <br>
            <label for="map">Map? <input type="checkbox" <?php  if($map === "on"){ echo "checked"; } ?> name="Map" ></label>
            <br>
            <input type="submit" class="btn" value="Play Again!">

        </form>

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

    <script type="text/javascript" src="../../js/main.js"></script>


    <script src="http://code.jquery.com/jquery-latest.min.js" crossorigin="anonymous"></script>




</body>
</html>