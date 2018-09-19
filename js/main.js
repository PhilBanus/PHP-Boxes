
        
        $('.greyout').hide(); 
        $('.popup').hide(); 

        
     function youWin(x) {
         
        $('.pyro, .before, .after').css('opacity', '1');
         
         $('.greyout').fadeIn(2000);
         
         $('.popup').delay(2000).fadeIn(2000);
      
         $(".header").html( "WOW! You Won!");
         
      
         
          if(xValue === 1 && yValue === 1) { 
             $(".body").html( "Congratulations, you have found the winning box! <br> <span class='small'>(although a 1x1 grid is a bit easy don't you think?)</span>" ); 
         } else {
              $(".body").html( "Congratulations, you have found the winning box! <br> " );
         }
         
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
         
         
        $('td').each(function () {
        var rowIndex = this.parentNode.rowIndex + 1;
        var cellIndex = this.cellIndex + 1;
          
      
                if (clickedCell === cellIndex && rowIndex <= winnerRow && rowIndex >= clickedRow) {

                     $(this).addClass("path down");
                }       
        
             if (clickedCell === cellIndex && rowIndex >= winnerRow && rowIndex <= clickedRow) {

                     $(this).addClass("path up");

                }     
            
            
            
            
        
              if (winnerRow === rowIndex && cellIndex <= winnerCell && cellIndex >= clickedCell) {

                     $(this).addClass("path right");

                }  
            
             if (winnerRow === rowIndex && cellIndex >= winnerCell && cellIndex <= clickedCell) {

                     $(this).addClass("path left");

                }  
            
            
              if (winnerRow === rowIndex && cellIndex === winnerCell) {

                     $(this).addClass("winner");
                  $(this).html("")

                }  
            
            
            
            
            
        
     })
         
          $('.greyout, .popup').fadeIn(2000); 
      
         $(".header").html( "Sorry not quite!");
         
         $(".body").html( "you clicked Cell " + clickedRow +" down and " + clickedCell + " across. <br> the winning Cell was, " + winnerRow + " down and " + winnerCell +" across<br> row Difference: " + Math.abs(differenceDown) + "<br> cell Difference: " + Math.abs(differenceAccross) + "<br> you were " + cellsAway + " cells away" );
         
}
        

  
    
         