function hamburg() {
    var x = document.getElementById("top_nav_burg");
    if (x.className === "topnav") {
        x.className += " burger";
    } else {
        x.className = "topnav";
    }
}

$('.games_shutt').css("background", "url(../img/games_bg.jpg)");
$('.fauna_shutt').css("background", "url(../img/fauna_bg_04.jpg)");
$('.science_shutt').css("background", "url(../img/science_bg.jpg)");
$('.words_shutt').css("background", "url(../img/words_bg.jpg)");
$('.sundry_shutt').css("background", "url(../img/sundry_bg.jpg)");
$('.media_shutt').css("background", "url(../img/media_bg_02.jpg)");
