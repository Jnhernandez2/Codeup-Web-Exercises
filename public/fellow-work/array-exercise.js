'use strict'

var names = ['john', 'paul', 'ringo', 'george', 'yoko'];
var upperNames = [];

console.log(names);

var uppercase = function() {
	names.forEach(function (name, i, names) {
		var firstLetter = name.charAt(0);
		var uppercaseFirstLetter = firstLetter.toUpperCase();
		var upperFirstLetter = name.replace(firstLetter, uppercaseFirstLetter);
		upperNames.push(upperFirstLetter);
	});

	console.log(upperNames);
};

uppercase();

var numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
var product = 1;

numbers.forEach(function (number) {
	product *= number;
});

console.log(product);