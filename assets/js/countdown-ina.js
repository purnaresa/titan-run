// set the date we're counting down to
var target_date = new Date("Aug 6, 2016").getTime();
 
// variables for time units
var hari, jam, menit, detik;
 
// get tag element
var countdown = document.getElementById("countdown");
 
// update the tag with id "countdown" every 1 second
setInterval(function () {
 
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
 
    // do some time calculations
    hari = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    jam = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    menit = parseInt(seconds_left / 60);
    detik = parseInt(seconds_left % 60);
     
    // format countdown string + set tag value
    countdown.innerHTML = "<div class='days'>" + hari + "</div> : " + "<div class='hours'>" +  jam + "</div> : " + "<div class='min'>" +
    + menit + "</div> : "+ "<div class='sec'>" + + detik+ "</div>";  
 
}, 1000);