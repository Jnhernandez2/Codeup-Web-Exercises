var allCones = Math.floor(Math.random() * 50) + 50;

var cones = Math.floor(Math.random() * 5) + 1;

var customer = 1

console.log("I have " + allCones + " to start with.");
do {
	console.log("I have " + allCones + " cones to sell.");
	console.log("I sold " + cones + " to customer " + customer + "!");
	customer++;

	var allCones = (allCones - cones)
	var cones = Math.floor(Math.random() * 5) + 1;

	if (allCones < 0) {
		console.log("Sorry, I don't have enough, but I can give you " + (allCones + cones) + " instead.");
	}

	if (allCones <= 0) {
		console.log("I sold all the cones!");
	}

} while (allCones >= 0)

var i = 1

while (i <= 65536) {
	console.log(i);
	i = i * 2;
}

// do {
// 	console.log(allCones)
// 	allCones++;
// } while (allCones <= 100)

// while (cones < allCones) {
// 	console.log(cones + " sold!");
// 	cones++;
// } 



// while {
// 	console.log("I can't sell you " + cones + " I only have " + allCones + " left.")
// }