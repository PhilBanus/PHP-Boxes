<style>
    
    
    <?php 
    
    
//calculate even cell width and heights i.e. 100/5 = 20 (%)
$cellWidth =  floor (100/$xValue);
$cellHeight =  floor (100/$yValue);

//make squares by changing the height or width of the table ie. 10*40/2 = 200
//set width default
 $width = $cellHeight*$xValue/2; 
//margin left calculated by 100% - width / 2 (100 -50%) = (50%)/2 = 25% either side 
 $left = (100 - $width)/2;
 $height = 100;
    
//make an exception when calculated width is greater than 100 vary the height instead. 
if($width > 100){   $height = $cellWidth*$yValue*2; $width = 100; $left=0;  }
        
// this should create nice even boxes most of the time. there are exceptions when one value is massivly greater than the other (100+)

?> 
        
        /* hide body then fade in once elements are loaded */
        body{
            display: none;
        }

        
        
        
        <?php 
        // check for map activation then apply variabled css for map setting
        if($map === "on"){ 
        ?>
        
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
            border: 1px green solid !important;
        }
        
       <?php } 
        
        //set variables for no map
        else { 
        ?>   
        
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
            background: <?php echo $_SESSION['tdColor'] ?> ;
            
        }
        
        
        <?php } ?>
        
   
        
       
        
        /* display winner for testing 
        #winner{
            background: rgba(0,0,0,0.1) !important
        }
       
     */
     
    
    
    
    
    
    
}
</style>