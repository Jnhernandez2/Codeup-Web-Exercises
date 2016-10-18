//calcualtor javascript goes here.
"Use Strict";

var first = document.getElementById("firstInput");

var middle = document.getElementById("mathFunction");

var last = document.getElementById("secondInput");

var answerInput = document.getElementById("answerInput");



var buttons = document.getElementsByClassName("calculator-button");

var clear = document.getElementById("clear");

var negative = document.getElementById("negative");

var decimal = document.getElementById("point");

var inputNumbers = function () {
	var selection = this.getAttribute('value');

	if (!answerInput.value) {
		if (selection === "+" || selection === "-" || selection === "*" || selection === "/") {
			middle.value = selection;
		} else if (middle.value === "") {
			first.value += selection;
		} else if (selection === "=") {
			doMath();
		} else {
			last.value += selection;
		}
	} else {
		if (selection === "+" || selection === "-" || selection === "*" || selection === "/") {
			first.value = answerInput.value
			middle.value = selection;
			last.value = "";
			answerInput.value = "";
		} else if (selection === "=") {
			doMath();
		} else {
			last.value += selection;
		}
			
	}
};

var doMath = function() {
		var firstInput = parseFloat(first.value);
		var lastInput = parseFloat(last.value);
		var answer = "";

		if (middle.value === "+") {
			answer = firstInput + lastInput;
		} else if (middle.value === "-") {
			answer = firstInput - lastInput;
		} else if (middle.value === "*") {
			answer = firstInput * lastInput;
		} else if (middle.value === "/") {
			if (lastInput == "0") {
				answer = "Error";
			} else {
				answer = firstInput / lastInput;
			}
			
		}

		answerInput.value = answer;
		if (answer === NaN) {
			answer = answer + "MASTE";
		}
		
		console.log(answer);
};


for (var i = 0; i < buttons.length; i++) {
	buttons[i].addEventListener("click", inputNumbers, false);
	console.log("hi");
};

var clearInputs = function() {
	first.value = "";
	middle.value = "";
	last.value = "";
	answerInput.value = "";
};

clear.addEventListener("click", clearInputs, false);


var decimalInput = function() {
	var selection = this.getAttribute('value');
	var activeScreen;

		if (middle.value === "") {
			activeScreen = first;
		} else {
			activeScreen = last;
		}

		if (activeScreen.value == "") {
			activeScreen.value = "0" + selection;
		} else {
			activeScreen.value += selection;
		}
	
};


decimal.addEventListener("click", decimalInput, false);


var negativeInput = function() {
	var selection = this.getAttribute('value');
	var activeScreen;

	if (middle.value == "") {
		activeScreen = first;
		if (activeScreen.value == "") {
			activeScreen.value = "-";
		} else if (activeScreen.value == "-") {
			activeScreen.value = "";
		} else {
			activeScreen.value = (activeScreen.value * -1);
		}
		
	} else {
		activeScreen = last;
		if (activeScreen.value == "") {
			activeScreen.value = "-";
		} else if (activeScreen.value == "-") {
			activeScreen.value = "";
		} else {
			activeScreen.value = (activeScreen.value * -1);
		}
	}

	
}

negative.addEventListener("click", negativeInput, false);


