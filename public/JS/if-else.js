"use strict";



var student = {
	grades: [],
	name: null,
	subject: null,

	getAverage: function() {
		var average = 0;
		var total = 0;
		for (var i = 0; i < this.grades.length; i++) {
			total = (total + this.grades[i]);
			console.log(total);
		}
		average = (total / this.grades.length);
		console.log(average);
		return average;
	}
};

student.name = prompt("Please Enter student\'s name.");
student.subject = prompt("Please Enter Class Subject.");

var gradeConfirm = confirm("Do you want to Enter Student Grades?");
if (gradeConfirm == true) {
	var gradeNumber = prompt("How many grades would you like to enter?");
	for (var i = 0; i < gradeNumber; i++) {
		var score = prompt("Please enter grade " + (i +1) + ":");
		student.grades.push(Number(score));
	};
};

var average = student.getAverage();

if (average > 80) {
	alert("You're Awesome!");
} else {
	alert("You need more practice.");
};





// var Campurchase = 180
// var Ryanpurchase = 250
// var Georgepurchase = 320
// var threshold = 200
// var discount = .35
// var Camdiscount = Campurchase - (Campurchase * discount)
// var Ryandiscount = Ryanpurchase - (Ryanpurchase * discount)
// var Georgediscount = Georgepurchase - (Georgepurchase * discount)

// if (Campurchase < threshold) {
// 	console.log ("Cameron spent: " + Campurchase + ". Sorry, no discount.");
// } else if (Campurchase > threshold) {
// 	console.log("Cameron spent: " + Campurchase + ". After discount: " + Camdiscount + "! Congratulations!");
// }

// if (Ryanpurchase < threshold) {
// 	console.log("Ryan spent: " + Ryanpurchase + ". Sorry, no discount.");
// } else if (Ryanpurchase > threshold) {
// 	console.log("Ryan spent: " + Ryanpurchase + ". After discount: " + Ryandiscount + "! Congratulations!");
// }

// if (Georgepurchase < threshold) {
// 	console.log("George spent: " + Georgepurchase + ". Sorry, no discount.");
// } else if (Georgepurchase > threshold) {
// 	console.log("George spent: " + Georgepurchase + ". After discount: " + Georgediscount + "! Congratulations!");
// }




// var flipACoin = Math.floor(Math.random()* 2)
// var headsbuyhouse = 1
// var tailsbuycar = 0

// if (flipACoin == 1) {
// 	console.log("You got Heads! Buy a house!");
// } else if (flipACoin == 0) {
// 	console.log("You got tails! Buy a car! Live in it!");
//}