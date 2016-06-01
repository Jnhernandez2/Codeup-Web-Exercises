var luckyNumber = Math.floor(Math.random()* 6)
var total = 60
var zeroDiscount = total
var oneDiscount = total - (total * .10)
var twoDiscount = total - (total * .25)
var threeDiscount = total - (total * .35)
var fourDiscount = total - (total * .50)
var fiveDiscount = 0

switch (luckyNumber) {
	case 0:
		console.log("You pay " + zeroDiscount + "! You pay FULL PRICE! MUAH HAHAHAHA!!!");
		break;
	case 1:
		console.log("You get 10% off! Your total is " + oneDiscount + "!");
		break;
	case 2:
		console.log("You get 25% off! Your total is " + twoDiscount + "!");
		break;
	case 3:
		console.log("You get 35% off! Your total is " + threeDiscount + "!");
		break;
	case 4:
		console.log("You get 50% off! Your total is " + fourDiscount + "!");
		break;
	case 5:
		console.log("HOLY SHIT! YOU GOT FIVE! YOU PAY " + fiveDiscount + "! Your groceries are FREE!!!!");
		break;
}



var randoMonth = Math.floor(Math.random()* 12) + 1

switch (randoMonth) {
	case 1:
		console.log("January");
		break;
	case 2:
		console.log("February");
		break;
	case 3:
		console.log("March");
		break;
	case 4:
		console.log("April");
	case 5:
		console.log("May");
		break;
	case 6:
		console.log("June");
		break;
	case 7:
		console.log("July");
		break;
	case 8:
		console.log("August");
		break;
	case 9:
		console.log("September");
		break;
	case 10:
		console.log("October");
		break;
	case 11:
		console.log("November");
		break;
	case 12:
		console.log("December");
		break;
}