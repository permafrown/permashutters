function hamburg() {
    var x = document.getElementById("top_nav_burg");
    if (x.className === "topnav") {
        x.className += " burger";
    } else {
        x.className = "topnav";
    }
}

$('.games_shutt').css("background", "url(../img/games_bg.jpg) center/cover no-repeat");
$('.fauna_shutt').css("background", "url(../img/fauna_bg_04.jpg) center/cover no-repeat");
$('.science_shutt').css("background", "url(../img/science_bg.jpg) center/cover no-repeat");
$('.words_shutt').css("background", "url(../img/words_bg.jpg) center/cover no-repeat");
$('.sundry_shutt').css("background", "url(../img/sundry_bg.jpg) center/cover no-repeat");
$('.media_shutt').css("background", "url(../img/media_bg_02.jpg) center/cover no-repeat");
