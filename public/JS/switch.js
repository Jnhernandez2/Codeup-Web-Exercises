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