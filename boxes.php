   <?php 
    
$xValue = $_GET['X'];

$yValue = $_GET['Y'];

$randomNumber = rand(1,$xValue*$yValue);
    
    
    $number = 1;

    $cellWidth = 100/$xValue;
    $cellHeight = 100/$yValue;
    
    
  

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
        
        
    
    
        
      #example{
            width: 100%; 
       
 transform-origin: top center;
            position: absolute;
          background: green
           
                
        }
        
      
        
        
        .box{
            width: 100px; 
            height: 100px;
            content: '';
            position: relative;
            background: royalblue;
            border-radius: 5px;
            float: left
        }
     
    
        
        .box:hover{
            background: yellow; 
            cursor: pointer;
        }
        
        #winner{
            background: orange;
        }
        
    
        
        .selected{
            background: red;
        }
        
        .boxRow{
            width: 100%;
            display: block
        }
    
    </style>

    
    </head>

<body class="bg-dark" >
    

    
    
    
    
    <div id="example">
 
        
          <?php 
    
    $row = 1;
    
                for ($y = 1; $y <= $_GET['Y']; $y++) {
                    
                    ?>
                    
                    <div class="boxRow">
        
        <?php 
                for ($x = 1; $x <= $_GET['X']; $x++) {
                                                
                                                    
                                                    if($number === $randomNumber){  echo "<div id='winner' class='box' onclick='youWin()'></div>"; } else { echo "<div class='box Loser' onclick='youLose(this)'></div>"; }
                                                    
                                                   
                                                $number++;
                                            }   
                    
                    $row++
        ?>
        
                
        
   </div>
    
        <?php 
                                              
                                            }   
        ?>
        
   
    

    </div>
    
    

    
    <script>
        
        if ($('body')[0].scrollHeight >  $('body').innerHeight()) {
    //Text has over-flown

           $('#example').css({ transform: 'scale(.2)' });
            
            
            }
        
     function youLose(x) {
         
         
        var clickedRow =  x.parentNode.rowIndex + 1;
        var clickedCell =  x.cellIndex +1;
         
        var winnerCell =  document.getElementById('winner').cellIndex + 1;
        var winnerRow = document.getElementById('winner').parentNode.rowIndex + 1;
         
        
         var differenceDown = clickedRow - winnerRow;
         var differenceAccross = clickedCell - winnerCell;
         var cellsAway = Math.abs(differenceAccross)+Math.abs(differenceDown);

         
         x.className += " selected";
         
     
         
         alert( "you clicked Cell " + clickedRow +" down and " + clickedCell + " across. <br> the winning Cell was, " + winnerRow + " down and " + winnerCell +" across<br> row Difference: " + Math.abs(differenceDown) + "<br> cell Difference: " + Math.abs(differenceAccross) + "<br> you were " + cellsAway + " cells away" );
         
}
        
        
        
        
    
          

        
        
    </script>
    
    
    
    
    
    
	 <script src="http://code.jquery.com/jquery-latest.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	
    
</body>
</html>