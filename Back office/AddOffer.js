let myForm = document.getElementById("myForm");
let myTitle = document.getElementById("myTitle");
let myDestination = document.getElementById("myDestination");
let myDepartureDate = document.getElementById("Ddate");
let myReturnDate = document.getElementById("Rdate");
let myPrice = document.getElementById("myPrice");
let myButton = document.getElementById("myButton");
let myRegex = /^[a-zA-Z\s]+$/;
let myRegex2 = /^[0-9]*\.?[0-9]+$/;
//-------------------------------- functions --------------------------
function WrongInput(message, err) {
  window.alert(message);
  err.innerHTML = message;
  err.style.color = "red";
}

function WrongInput2(message, err) {
  err.innerHTML = message;
  err.style.color = "red";
}

function Correct(err) {
  err.innerHTML = "Correct";
  err.style.color = "green";
}
//-------------------------------------------- addEventListener ----------------------- 
myForm.addEventListener("submit", function (e) {
  let myError = document.getElementById("Error1");
  let myError2 = document.getElementById("Error2");
  let myError3 = document.getElementById("Error3");
  let myError4 = document.getElementById("Error4");
  let myError5 = document.getElementById("Error5");

  // Title validation
  if (myTitle.value.trim() === "") {
    WrongInput("Title is required", myError);
    e.preventDefault();
  } else if (!myRegex.test(myTitle.value)) {
    WrongInput("Only letters and spaces allowed", myError);
    e.preventDefault();
  } else if (myTitle.value.trim().length < 3) {
    WrongInput("The title must contain at least 3 letters", myError);
    e.preventDefault();
  } else {
    Correct(myError);
  }
  let returnDate = new Date(myReturnDate.value);
  let departureDate = new Date(myDepartureDate.value);
  // Destination validation
  if (myDestination.value.trim() === "") {
    WrongInput("Destination is required", myError2);
    e.preventDefault();
  } else if (!myRegex.test(myDestination.value)) {
    WrongInput("Only letters and spaces allowed", myError2);
    e.preventDefault();
  } else if (myDestination.value.trim().length < 3) {
    WrongInput("The destination must contain at least 3 letters", myError2);
    e.preventDefault();
  } else {
    Correct(myError2);
  }

  // Return date validation
  if (myReturnDate.value.trim() === "") {
    WrongInput("Return date is required", myError4);
    e.preventDefault();
  } else if (returnDate - departureDate < 0) {
    WrongInput("Return date must be after departure date", myError4);
    e.preventDefault();
  } else {
    Correct(myError4);
  }

  // Departure date validation
  if (myDepartureDate.value.trim() === "") {
    WrongInput("Departure date is required", myError3);
    e.preventDefault();
  } else if (returnDate - departureDate < 0) {
    WrongInput("departure date must be before return date", myError3);
    e.preventDefault();
  } else {
    Correct(myError3);
  }

  // Price validation
  if (myPrice.value.trim() === "") {
    WrongInput("Price is required", myError5);
    e.preventDefault();
  } else if (!myRegex2.test(myPrice.value) && myPrice.value < 0) {
    WrongInput("Only positive numbers allowed", myError5);
    e.preventDefault();
  } else {
    Correct(myError5);
  }
});
//--------------------------------------------------- keyup events -----------------
myTitle.addEventListener("keyup", function () {
  let myError = document.getElementById("Error1");
  if (myTitle.value.trim().length < 3) {
    WrongInput2("title must has at least 3 letters", myError);
  } else {
    Correct(myError);
  }
});
myDestination.addEventListener("keyup", function () {
  let myError2 = document.getElementById("Error2");
  if (myDestination.value.trim().length < 3) {
    WrongInput2("Destination must has at least 3 letters", myError2);
  } else if (!myRegex.test(myDestination.value.trim())) {
    WrongInput2("Destination must contain only letters and spaces", myError2);
  } else {
    Correct(myError2);
  }
});
myPrice.addEventListener("keyup", function () {
  let myError5 = document.getElementById("Error5");
  if (myPrice.value.trim() < 0) {
    WrongInput2("Price must be positive", myError5);
  } else {
    Correct(myError5);
  }
});
//----------------------------------- onClick  --------  
myButton.onclick = function (e) {
  let myError = document.getElementById("Error1");
  let myError2 = document.getElementById("Error2");
  let myError3 = document.getElementById("Error3");
  let myError4 = document.getElementById("Error4");
  let myError5 = document.getElementById("Error5");

  // Title validation
  if (myTitle.value.trim() === "") {
    WrongInput("Title is required", myError);
    e.preventDefault();
  } else if (!myRegex.test(myTitle.value)) {
    WrongInput("Only letters and spaces allowed", myError);
    e.preventDefault();
  } else if (myTitle.value.trim().length < 3) {
    WrongInput("The title must contain at least 3 letters", myError);
    e.preventDefault();
  } else {
    Correct(myError);
  }
  let returnDate = new Date(myReturnDate.value);
  let departureDate = new Date(myDepartureDate.value);
  // Destination validation
  if (myDestination.value.trim() === "") {
    WrongInput("Destination is required", myError2);
    e.preventDefault();
  } else if (!myRegex.test(myDestination.value)) {
    WrongInput("Only letters and spaces allowed", myError2);
    e.preventDefault();
  } else if (myDestination.value.trim().length < 3) {
    WrongInput("The destination must contain at least 3 letters", myError2);
    e.preventDefault();
  } else {
    Correct(myError2);
  }

  // Return date validation
  if (myReturnDate.value.trim() === "") {
    WrongInput("Return date is required", myError4);
    e.preventDefault();
  } else if (returnDate - departureDate < 0) {
    WrongInput("Return date must be after departure date", myError4);
    e.preventDefault();
  } else {
    Correct(myError4);
  }

  // Departure date validation
  if (myDepartureDate.value.trim() === "") {
    WrongInput("Departure date is required", myError3);
    e.preventDefault();
  } else if (returnDate - departureDate < 0) {
    WrongInput("departure date must be before return date", myError3);
    e.preventDefault();
  } else {
    Correct(myError3);
  }

  // Price validation
  if (myPrice.value.trim() === "") {
    WrongInput("Price is required", myError5);
    e.preventDefault();
  } else if (!myRegex2.test(myPrice.value) && myPrice.value < 0) {
    WrongInput("Only positive numbers allowed", myError5);
    e.preventDefault();
  } else {
    Correct(myError5);
  }
};
