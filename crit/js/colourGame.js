var numSquares = 6;
var colours = [];
var pickedColour;
var squares = document.querySelectorAll(".square");
var colourDisplay = document.getElementById("colourDisplay");
var messageDisplay = document.querySelector("#message");
var h1 = document.querySelector("h1");
var titleBox = document.querySelector("#titlebox");
var titleBoxH3 = document.querySelector("#titlebox h3");
var resetButton = document.querySelector("#reset");
var modeButtons = document.querySelectorAll(".mode");

init();

function init() {
  setUpModeButtons();
  setUpSquares();
  reset();
};

function setUpModeButtons() {
  //modeButtons Event listeners
  for (var i = 0; i < modeButtons.length; i++) {
    modeButtons[i].addEventListener("click", function() {
      modeButtons[0].classList.remove("selected");
      modeButtons[1].classList.remove("selected");
      modeButtons[2].classList.remove("selected");
      this.classList.add("selected");
      //decide how many squares to show (ternary operator)
      this.textContent === "Easy" ? numSquares = 3: numSquares = 6;
      //pick new colours; pick a new pickedColour; update page to reflect changes
      reset();
    });
  }
};

function setUpSquares() {
  //squares event listeners & colour changes
  for (var i = 0; i < squares.length; i++) {
    //add click listeners to squares
    squares[i].addEventListener("click", function() {
      //grab colour of clicked square
      var clickedColour = this.style.backgroundColor;
      //compare to pickedColour
      if (clickedColour === pickedColour) {
        messageDisplay.textContent = "Correct!!";
        changeColours(clickedColour);
        titleBox.style.backgroundColor = pickedColour;
        resetButton.textContent = "Play Again?"
      } else {
        this.style.backgroundColor = "#333";
        messageDisplay.textContent = "Nope! Try Again ...";
      }
    });
  };
};

colourDisplay.textContent = pickedColour;

function reset(){
  //generate all new colours
  colours = generateRandomColours(numSquares);
  //pick new random colour from array
  pickedColour = pickColour();
  //change colourDisplay to match pickedColour
  colourDisplay.textContent = pickedColour;
  //change colours of squares on page
  for (var i = 0; i < squares.length; i++) {
    if (colours[i]) {
      squares[i].style.display = "block";
      squares[i].style.backgroundColor = colours[i];
    } else {
      squares[i].style.display = "none";
    }
  };
  //update page content
  if (modeButtons[2].classList.contains("selected")) {
    titleBoxH3.textContent = "Which two colours are the same?";
    titleBox.style.backgroundColor = "steelblue";

    var random = Math.floor(Math.random() * squares.length);
    var kidSquare = squares[random];
    kidSquare.style.backgroundColor = "#080";
    // if (kidSquare.style.backgroundColor === pickedColour) {

    // }
    // kidSquare.style.backgroundColor = pickedColour;
  } else {
    titleBoxH3.textContent = "Guess which colour is:";
    titleBox.style.backgroundColor = "steelblue";
  };
  messageDisplay.textContent = "";
  resetButton.textContent = "new colours?";
}

resetButton.addEventListener("click", reset);

function changeColours(colour){
  //loop through all squares
  for (var i = 0; i < colours.length; i++){
    //change each square to match correct colour
    squares[i].style.backgroundColor = colour;
  }
}

function pickColour() {
  var random = Math.floor(Math.random() * colours.length);
  return colours[random];
}

function generateRandomColours(num) {
  //Make an array
  var arr = [];
  //repeat num times
  for (var i = 0; i < num; i++) {
    //get random colour and push to array
    arr.push(randomColour());
  }
  //return that array
  return arr;
}

function randomColour() {
  //pick a 'red' from 0 - 255
  var r = Math.floor(Math.random() * 256);
  //pick a 'green' from 0 - 255
  var g = Math.floor(Math.random() * 256);
  //pick a 'blue' from 0 - 255
  var b = Math.floor(Math.random() * 256);
  //return as RGB string
  return "rgb(" + r + ", " + g + ", " + b + ")";
}
