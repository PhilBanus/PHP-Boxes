// hide on click elements
$('.greyout').hide();
$('.popup').hide();


// when document is loaded fade it in
$(document).ready(function () {
    $('body').fadeIn(1000);
});



// win scenario
function youWin() {

    //display hiden elements
    $('.pyro, .before, .after').css('opacity', '1');

    $('.greyout').fadeIn(2000);
    $('#nextLevel').show();
    $('#winner').addClass("winner");

    $('.popup').delay(3000).fadeIn(2000);

    //Define header title
    $(".header").html("WOW! You Won!");

    //if 1x1 game then tell the user that was a bit easy....
    if (xValue === 1 && yValue === 1) {
        $(".body").html("Congratulations, you have found the winning Square!<br> <span class='small'>(although a 1x1 grid is a bit easy don't you think?)</span>");
    }
    // if greater than 1x1 then show normal you won text
    else {
        $(".body").html("Congratulations, you have found the winning box! <br> ");
    }

}



// you loose function
function youLose(x, number) {

    // calulating path to winner
    //find clicked row index
    var clickedRow = x.parentNode.rowIndex + 1;
    //find clicked cell index
    var clickedCell = x.cellIndex + 1;
    // find winning cell index
    var winnerCell = document.getElementById('winner').cellIndex + 1;
    //find winning row index
    var winnerRow = document.getElementById('winner').parentNode.rowIndex + 1;

    //calculate difference in rows
    var differenceDown = clickedRow - winnerRow;
    //calcualte cell difference
    var differenceAccross = clickedCell - winnerCell;
    // work out how many cells away (math.abs for positive)
    var cellsAway = Math.abs(differenceAccross) + Math.abs(differenceDown);


    // now for the css bit
    //change clicked cell to red by adding selected class
    x.className += " selected";


    if (lives === 0) {
        //cycle through each cell
        $('td').each(function () {
            //find cell indexes
            var rowIndex = this.parentNode.rowIndex + 1;
            var cellIndex = this.cellIndex + 1;

            //find cells going down from clicked cell that are inbetween clicked and winning (find rows first then only select cells with matching cell index)
            if (clickedCell === cellIndex && rowIndex <= winnerRow && rowIndex >= clickedRow) {
                //add arrow
                $(this).addClass("path down");
            }

            //find cells going up from clicked cell that are inbetween clicked and winning (find rows first then only select cells with matching cell index)
            if (clickedCell === cellIndex && rowIndex >= winnerRow && rowIndex <= clickedRow) {
                //add arrow
                $(this).addClass("path up");

            }




            //find cells in the rows heading towards the winning cell (right) only select those inbetween winning and clicked cell indexes
            if (winnerRow === rowIndex && cellIndex <= winnerCell && cellIndex >= clickedCell) {
                //add arrow
                $(this).addClass("path right");

            }

            //find cells in the rows heading towards the winning cell (left) only select those inbetween winning and clicked cell indexes
            if (winnerRow === rowIndex && cellIndex >= winnerCell && cellIndex <= clickedCell) {

                $(this).addClass("path left");

            }

            //highlight the winning cell 
            if (winnerRow === rowIndex && cellIndex === winnerCell) {

                $(this).addClass("winner");


            }






        })

        //define header text
        $(".header").html("Sorry you Lost!");
        //define body text
        $(".body").html("You clicked Square " + clickedRow + " down and " + clickedCell + " across. <br> The winning Square was " + winnerRow + " down and " + winnerCell + " across<br> You were " + cellsAway + " Square(s) away");

        removeCookie("PHPSESSID");



    } else {

        $('#retry').show();

        //define header text
        $(".header").html("Sorry not quite!");
        //define body text
        $(".body").html("You are " + cellsAway + " Square(s) away <br> " + lives + " Lives remaining");

    }

    $('#clickedNumber').val(number);

    //fade in the popup and greyed out background
    $('.popup').delay(2000).fadeIn(2000);
    $('.greyout').fadeIn(2000);



}


function removeCookie(cookieName) {
    var cookieValue = "";
    var cookieLifetime = -1;
    var date = new Date();
    date.setTime(date.getTime() + (cookieLifetime * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toGMTString();
    document.cookie = cookieName + "=" + JSON.stringify(cookieValue) + expires + "; path=/";
}
