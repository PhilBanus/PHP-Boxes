<?php 

session_start();

   $background_colors = array('#87cefa', '#98fb98', '#9370db', '#ffe4e1', '#ff8c00');

 if (isset($_POST['start'])) {
    $_SESSION['progress'] = 1;
    $_SESSION['X'] = 1;
    $_SESSION['Y'] = 1;
    //get boxes going across
    $xValue =  $_SESSION['X'] ?? 1;
    //get boxes going down
    $yValue =  $_SESSION['Y'] ?? 1;
    
    $_SESSION['lives'] = 3;
     
     
    //generate a random number for winning square
     $randomNumber = rand(1,$xValue*$yValue);
     $_SESSION['random'] = $randomNumber;
     
    
     

     $_SESSION['tdColor'] = $background_colors[array_rand($background_colors)];
     
     unset($_POST);
     
     
  }



 if (isset($_POST['next'])) {
   
     $_SESSION['progress']++ ;
     
     if($_SESSION['progress'] >= 10){ $_SESSION['Map'] = "on"; }
    
     if($_SESSION['Y'] === $_SESSION['X']){ ++$_SESSION['X']; }else { ++$_SESSION['Y'] ;}
     
    //get boxes going across
    $xValue =  $_SESSION['X'] ?? 1;
    //get boxes going down
    $yValue =  $_SESSION['Y'] ?? 1;
    
    $_SESSION['lives'] = 3;
     
     //generate a random number for winning square
     $randomNumber = rand(1,$xValue*$yValue);
     $_SESSION['random'] = $randomNumber;
     
     
     unset($_SESSION['numberOne']);
     unset($_SESSION['numberTwo']);
     unset($_SESSION['numberThree']);
     
     $_SESSION['tdColor'] = $background_colors[array_rand($background_colors)];
    
     unset($_POST);
     
  }

if (isset($_POST['retry'])) {
    
        --$_SESSION['lives'];
     $randomNumber = $_SESSION['random'];
    
    if(!$_SESSION['numberOne']){ $_SESSION['numberOne'] = $_POST['clickedNumber']; }else{
        if(!$_SESSION['numberTwo']){ $_SESSION['numberTwo'] = $_POST['clickedNumber']; }else{
        $_SESSION['numberThree'] = $_POST['clickedNumber'];
            
         unset($_POST);
    }
    }
    
    
    
    
    
     
  }


 if (isset($_POST['destroy'])) {
    session_unset();
    session_destroy();

     
    
     
  }



    $randomNumber = $_SESSION['random'];
    //get boxes going across
    $xValue =  $_SESSION['X'] ?? 1;
    //get boxes going down
    $yValue =  $_SESSION['Y'] ?? 1;
    
  



$progress = $_SESSION['progress'] ?? 0;
// define variables from submited form

//get map on or off
$map = $_SESSION['Map'] ?? "off";


//set number of first cell
$number = 1; 

?>