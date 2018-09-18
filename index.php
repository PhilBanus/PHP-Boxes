   <?php 
    
$xValue = $_GET['X'];

$yValue = $_GET['Y'];


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
        

        
        
      table{
            width: <?php echo $width ?>% !important; 
          height: <?php echo $height ?>%;
           border-spacing: 1%;
          left: <?php echo $left ?>%;
    border-collapse: separate;
 transform-origin: top center;
            position: absolute;
           
                
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
            border: 5px;
        }
        
       
     
    
        
    </style>
    <link href="css/main.css" rel="stylesheet" type="text/css">
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
    
        <input type="submit" class="btn" value="Play!">
        
    </form>

    </div>
    

        
    <?php 
        
    }
                else 
                    
                { 
    
    
    
    ?>
    
    <div class="tableWrap">
    
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
    
        <input type="submit" class="btn" value="Play Again!">
        
    </form>
        
        </div>
    
    <div class="greyout"></div>
    
    
    
    <script>
    
        var xValue = <?php echo $xValue ?>; 
        var yValue = <?php echo $yValue ?>; 
    
    
    </script>
    
    
    
    
    
    <script type="text/javascript" src="js/main.js"></script>

	 <script src="http://code.jquery.com/jquery-latest.min.js" crossorigin="anonymous"></script>
	
    
</body>
</html>