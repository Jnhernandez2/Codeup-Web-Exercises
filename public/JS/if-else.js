"use strict";

var grade1 = 70
var grade2 = 80
var grade3 = 95
var average = (grade1 + grade2 + grade3)/3


if (average > 80) {
	console.log("You're Awesome!");
} else {
	console.log("You need more practice.")
}




var Campurchase = 180
var Ryanpurchase = 250
var Georgepurchase = 320
var threshold = 200
var discount = .35
var Camdiscount = Campurchase - (Campurchase * discount)
var Ryandiscount = Ryanpurchase - (Ryanpurchase * discount)
var Georgediscount = Georgepurchase - (Georgepurchase * discount)

if (Campurchase < threshold) {
	console.log ("Cameron spent: " + Campurchase + ". Sorry, no discount.");
} else if (Campurchase > threshold) {
	console.log("Cameron spent: " + Campurchase + ". After discount: " + Camdiscount + "! Congratulations!");
}

if (Ryanpurchase < threshold) {
	console.log("Ryan spent: " + Ryanpurchase + ". Sorry, no discount.");
} else if (Ryanpurchase > threshold) {
	console.log("Ryan spent: " + Ryanpurchase + ". After discount: " + Ryandiscount + "! Congratulations!");
}

if (Georgepurchase < threshold) {
	console.log("George spent: " + Georgepurchase + ". Sorry, no discount.");
} else if (Georgepurchase > threshold) {
	console.log("George spent: " + Georgepurchase + ". After discount: " + Georgediscount + "! Congratulations!");
}




var flipACoin = Math.floor(Math.random()* 2)
var headsbuyhouse = 1
var tailsbuycar = 0

if (flipACoin == 1) {
	console.log("You got Heads! Buy a house!");
} else if (flipACoin == 0) {
	console.log("You got tails! Buy a car! Live in it!");
}