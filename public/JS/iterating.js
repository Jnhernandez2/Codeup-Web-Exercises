(function(){
    "use strict";

    // TODO: Create an array of 4 people's names using literal array notation, in a variable called 'names'.
	var names = ["Ashley", "Steve", "Brian", "Shirley"]
    // TODO: Create a log statement that will log the number of elements in the names array.
    console.log("The array is " + names.length + " elements long.");
    // TODO: Create log statements that will print each of the names array elements individually.
    for (var i = 0; i < names.length; i++) {
    	console.log("The shape at index " + i + " is " + names[i]);
    }

    names.forEach(function(element, index) {
    	console.log("The name at " + index + " is " + element);
    });
    // console.log("The first name is " + names[0] + ".");
    // console.log("The second name is " + names[1] + ".");
    // console.log("The third name is " + names[2] + ".");
    // console.log("The fourth name is " + names[3] + ".");
})();
