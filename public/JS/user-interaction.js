"use strict";

// TODO: Ask the user for their name.
//       Keep asking if an empty input is provided.

do {
	var response = prompt("What is your name?");
} while (response == null || !isNaN(response));


 // 	prompt("What is your name?");
 // }
// TODO: Show an alert message that welcomes the user based on their input.
alert("Hey, " + response + "! Welcome!");
// TODO: Ask the user if they like pizza.
//       Based on their answer show a creative alert message.
confirm("So, " + response + ", do you like pizza?")

if (confirm = true) {
	alert("Nice! Let's go get some!");
} else if (confirm = false) {
	alert("You need pizza in your life.");
}