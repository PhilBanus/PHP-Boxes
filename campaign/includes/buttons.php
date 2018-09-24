    <form action="" method="post">
        
        <?php
           if($progress === 0){
        
        ?>
        
        <input type="submit" class="btn" value="Start!" name="start">
        
        <?php } else { ?>
        
        
        <input type="submit" class="btn btn-red" value="Exit!" name="destroy">
        <input type="submit" id="nextLevel" style="display: none" class="btn" value="Next Level!" name="next">
        
        
        <input type="number" id="clickedNumber" name="clickedNumber" hidden>
        <input type="submit" id="retry" style="display: none" class="btn" value="Try Again" name="retry">
    
        <?php }?>
        
        </form>