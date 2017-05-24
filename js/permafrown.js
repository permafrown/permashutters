// Copyright 2016. GoodLife Music Ltd.. All Rights Reserved.
function hamburg() {
    var x = document.getElementById("top_nav_burg");
    if (x.className === "topnav") {
        x.className += " burger";
    } else {
        x.className = "topnav";
    }
}