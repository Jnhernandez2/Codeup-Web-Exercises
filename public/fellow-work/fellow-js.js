'use strict'

function average3Grades() {
	var grades = 0;
	var numberOfGrades = 0;
	var i = 1;
	for (i = 1; i <= 3; i++) {
		grades += parseInt(prompt('Enter a grade.'));
		numberOfGrades++
	}

	console.log('Total sum of grades: ' + grades);
	console.log('Divided by ' + numberOfGrades);
	
	var average = (grades / numberOfGrades);

	if (average > 80) {
		console.log('Your average is ' + average + '. Great Job!');
	} else {
		console.log('Your average is ' + average + '. You could use some more practice.');
	}
}

function genericGradesAverage() {
	var gradesTotal = 0;
	var numberOfGrades = 0;
	var i = 0;
	do {
		gradesTotal += parseInt(prompt('please input grade.'));
		numberOfGrades++;
	} while (confirm('Do you have a grade to input?'));

	console.log('Total sum of grades: ' + gradesTotal);
	console.log('Divided by the number of grades: ' + numberOfGrades);

	var average = (gradesTotal / numberOfGrades);

	if (average > 80) {
		console.log('Your average is ' + average + '. Great Job!');
	} else {
		console.log('Your average is ' + average + '. You could use some more practice.');
	}

}

average3Grades();
genericGradesAverage();

