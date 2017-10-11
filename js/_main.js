function hamburg() {
    var x = document.getElementById("top_nav_burg");
    if (x.className === "topnav") {
        x.className += " burger";
    } else {
        x.className = "topnav";
    }
}

$('.games_shutt').css("background", "url(../img/games_bg.jpg) no-repeat");
$('.fauna_shutt').css("background", "url(../img/fauna_bg_04.jpg) no-repeat");
$('.science_shutt').css("background", "url(../img/science_bg.jpg) no-repeat");
$('.words_shutt').css("background", "url(../img/words_bg.jpg) no-repeat");
$('.sundry_shutt').css("background", "url(../img/sundry_bg.jpg) no-repeat");
$('.media_shutt').css("background", "url(../img/media_bg_02.jpg) no-repeat");
