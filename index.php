   <?php 
    
$xValue = $_GET['X'];

$yValue = $_GET['Y'];

$map = $_GET['Map'];


$randomNumber = rand(1,$xValue*$yValue);
    
    
    $number = 1;

    $cellWidth =  floor (100/$xValue);
    $cellHeight =  floor (100/$yValue);
    
     $width = $cellHeight*$xValue/2; 
     $left = (100 - $width)/2;
     $height = 100;
    
if($width > 100){   $height = $cellWidth*$yValue*2; $width = 100; $left=0;  }
        


    ?>


<!doctype html>

<html>
<head>
  <meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="pragma" content="no-cache" />
    
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    

    
<title>Grid Game</title>
    


    
    
    
    <style>
        

        
        <?php if($map === "on"){ ?>
        
      table, #map{
            width: <?php echo $width ?>% !important; 
          height: <?php echo $height ?>%;
           border-spacing: 1%;
          left: <?php echo $left ?>%;
    border-collapse: collapse;
 transform-origin: top center;
            position: absolute;
        
         
           
                
        }
        
        #map{
            z-index: 1
        }
        
        table{
            z-index: 2
        }
        
         tr{
            height: <?php echo $cellHeight ?>% !important; 
            width: 100% !important;
           background: transparent !important;

            
        }
        
        
        td{
             height: <?php echo $cellHeight ?>% !important; 
            width: <?php echo $cellWidth ?>%; 
            position: relative;
            background: transparent;
            border: 2px green solid !important;
        }
        
       <?php } else { ?>   
        
         table{
            width: <?php echo $width ?>% !important; 
          height: <?php echo $height ?>%;
           border-spacing: 1%;
          left: <?php echo $left ?>%;
    border-collapse: separate;
 transform-origin: top center;
            position: absolute;
        
         
           
                
        }
        
        #map{
            z-index: 1
        }
        
        table{
            z-index: 2
        }
        
         tr{
            height: <?php echo $cellHeight ?>% !important; 
            width: 100% !important;
          

            
        }
        
        
        td{
             height: <?php echo $cellHeight ?>% !important; 
            width: <?php echo $cellWidth ?>%; 
            position: relative;
             background: royalblue;
            
        }
        
        
        <?php } ?>
        
   
        
       
        
        /* display winner for testing 
        #winner{
            background: rgba(0,0,0,0.1) !important
        }
       
     */
    
        
    </style>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/fireworks.css" rel="stylesheet" type="text/css">
    
</head>

<body class="bg-dark text-white text-center" >
    

    
    <?php 
    
    if(!$xValue || !$yValue){
        
        ?>
    <div class="selector">
        
        <div class="header">Welcome</div>
        
        <form action="" method="get">
    
        <label for="X">Please choose a number of boxes going across:</label>
        <br>
        <input type="number" name="X" class="form-control" min="1" placeholder="7" required>
        <br>
        <label for="Y">Please choose a number of boxes going down:</label>
        <br>
        <input type="number" name="Y" class="form-control" min="1" placeholder="5" required> 
        <br>
            <label for="map">Map? <input type="checkbox" name="Map"></label>
        <br>
            
        <input type="submit" class="btn" value="Play!">
        
    </form>

    </div>
    

        
    <?php 
        
    }
                else 
                    
                { 
    
    
    
    ?>
    
    <div class="tableWrap" id="tableWrap">
    
    <table id="example">
 
        
          <?php 
    
 
    
                for ($y = 1; $y <= $_GET['Y']; $y++) {
                    
                    ?>
                    
                     <tr> 
        
        <?php 
                for ($x = 1; $x <= $_GET['X']; $x++) {
                                                
                                                    
                                                    if($number === $randomNumber){  
                                                        
                                                  
                                                        echo "<td id='winner' onclick='youWin()'></td>"; 
                                                    } else { 
                                                        echo "<td class='Loser' onclick='youLose(this)'></td>"; 
                                                    }
                                                    
                    
                                                   
                                                $number++;
                                            }   
                    
                  
        ?>
        
                
        
    </tr>
    
        <?php 
                                              
                                            }   
        ?>
        
   
    

    </table>
    
    
    <div id="map"></div>
    
    </div>
    
    
    
<?php } 
                ?>
    
    
    
    
    
    <div class="popup">
        <div class="header"></div>
        <div class="body"></div>
        
        <form action="" method="get">
            <legend>Try Again</legend>
    
        <label for="X">Please choose a number of boxes going across:</label>
        <br>
        <input type="number" name="X" value="<?php echo $xValue ?>" class="form-control" min="1" required>
        <br>
        <label for="Y">Please choose a number of boxes going down:</label>
        <br>
        <input type="number" name="Y" value="<?php echo $yValue ?>" class="form-control" min="1" required> 
        <br>
        <label for="map">Map? <input type="checkbox" <?php  if($map === "on"){ echo "checked"; } ?> name="Map" ></label>
        <br>
        <input type="submit" class="btn" value="Play Again!">
        
    </form>
        
        </div>
    
    
    <div class="greyout"></div>
  
     <div class="pyro">
  <div class="before"></div>
  <div class="after"></div>

    
    </div>
    
    
    
    <script>
    
        var xValue = <?php echo $xValue ?>; 
        var yValue = <?php echo $yValue ?>; 
    
        
        <?php 
    if($map === "on"){ ?> 
          
        function myMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
        center: new google.maps.LatLng(51.555775, -1.779718), 
        zoom: 10,
        disableDefaultUI: true
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
}
        
        <?php  } ?>
        
      
    
    </script>
    
    
    
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUqxDbiAMFT5WOdQ1VV8cbVDg3A3wS40o&callback=myMap"></script>
    
    
    <script type="text/javascript" src="js/main.js"></script>

	 <script src="http://code.jquery.com/jquery-latest.min.js" crossorigin="anonymous"></script>
	
    
  
    
</body>
</html>