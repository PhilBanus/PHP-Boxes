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

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="pragma" content="no-cache" />
    
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   
   <link href="https://www.banuscv.co.uk/Bootstrap/custom.css" rel="stylesheet" type="text/css"> 
   
    
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
        
       
     
    
        
        td:hover{
            background: yellow; 
            cursor: pointer;
        }
        
     
        
        .winner{
            background: white !important;
            color: black !important;

        }
        
        .selected{
            background: red !important;
        }
        
        .path{
            background: green;
        }
        
       
    
    </style>

    
    </head>

<body class="bg-dark text-white text-center" >
    

    
    <?php 
    
    if(!$xValue || !$yValue){
        
        ?>
    
        <form action="" method="get">
    
        <label for="X">Please choose a number of boxes going across:</label>
        <br>
        <input type="number" name="X" class="form-control" min="1" required>
        <br>
        <label for="Y">Please choose a number of boxes going Down:</label>
        <br>
        <input type="number" name="Y" class="form-control" min="1" required> 
        <br>
    
        <input type="submit" class="btn btn-success btn-lg">
        
    </form>

    
    <?php 
        
    }
                else 
                    
                { 
    
    
    
    ?>
    
    
    <table id="example">
 
        
          <?php 
    
 
    
                for ($y = 1; $y <= $_GET['Y']; $y++) {
                    
                    ?>
                    
                     <tr> 
        
        <?php 
                for ($x = 1; $x <= $_GET['X']; $x++) {
                                                
                                                    
                                                    if($number === $randomNumber){  
                                                        echo "<td id='winner' onclick='youWin(this)'></td>"; 
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
    
    
<?php } 
                ?>
    
    <script>
        

        
        function fadeSquare(){
             $(this).fadeIn(<?php echo rand(100,5000) ?>)
         };
        
        
     function youLose(x) {
         
         
        var clickedRow =  x.parentNode.rowIndex + 1;
        var clickedCell =  x.cellIndex +1;
         
        var winnerCell =  document.getElementById('winner').cellIndex + 1;
        var winnerRow = document.getElementById('winner').parentNode.rowIndex + 1;
         
        
         var differenceDown = clickedRow - winnerRow;
         var differenceAccross = clickedCell - winnerCell;
         var cellsAway = Math.abs(differenceAccross)+Math.abs(differenceDown);

         
         x.className += " selected";
         
         
        $('td').each(function () {
        var rowIndex = this.parentNode.rowIndex + 1;
        var cellIndex = this.cellIndex + 1;
          
      
                if (clickedCell === cellIndex && rowIndex <= winnerRow && rowIndex >= clickedRow) {

                     $(this).addClass("path");
                    $(this).html("&darr;")
                }       
        
             if (clickedCell === cellIndex && rowIndex >= winnerRow && rowIndex <= clickedRow) {

                     $(this).addClass("path");
                  $(this).html("&uarr;")

                }     
            
            
            
            
        
              if (winnerRow === rowIndex && cellIndex <= winnerCell && cellIndex >= clickedCell) {

                     $(this).addClass("path");
                        $(this).html("&rarr;")

                }  
            
             if (winnerRow === rowIndex && cellIndex >= winnerCell && cellIndex <= clickedCell) {

                     $(this).addClass("path");
                  $(this).html("&larr;")

                }  
            
            
              if (winnerRow === rowIndex && cellIndex === winnerCell) {

                     $(this).addClass("winner");
                  $(this).html("")

                }  
            
            
            
            
            
        
     })
         
         
     
         
         alert( "you clicked Cell " + clickedRow +" down and " + clickedCell + " across. <br> the winning Cell was, " + winnerRow + " down and " + winnerCell +" across<br> row Difference: " + Math.abs(differenceDown) + "<br> cell Difference: " + Math.abs(differenceAccross) + "<br> you were " + cellsAway + " cells away" );
         
}
        
        
       
    
          

        
        
    </script>
    
    
    
    
    
    
	 <script src="http://code.jquery.com/jquery-latest.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	
    
</body>
</html>