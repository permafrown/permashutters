function hamburg() {
    var x = document.getElementById("top_nav_burg");
    if (x.className === "topnav") {
        x.className += " burger";
    } else {
        x.className = "topnav";
    }
}
