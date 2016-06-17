'use strict';

var student = {
    awesomeGrade: 80,
    name: null,
    subjects: [],
    calculateAverage: function () {
        var average = 0;
        this.subjects.forEach(function (subject) {
            average += subject.grade; 
        });

        return average / this.subjects.length;
    },
    addSubject: function (name, grade) {
        var subject = {
            name: name,
            grade: grade
        };
        this.subjects.push(subject);
    },
    isAwesome: function () {
        return this.calculateAverage() > this.awesomeGrade;
    }
}

//Student Name Input
var studentInput = document.getElementById("name");
var table = document.getElementById("grades")


//Function That Takes Value from Input and Saves into Student Name
//Removes Disabled Attribute from Form Buttons
var inputStudentName = function() {  
    var studentName = document.getElementById("student-name");
    studentName.innerHTML = studentInput.value;

    var addButtonDisableRemove = document.getElementById("add-grade");
    addButtonDisableRemove.disabled = false;

    var calculateButtonDisableRemove = document.getElementById("calculate-average");
    calculateButtonDisableRemove.disabled = false;

    student.name = studentInput.value;
    console.log(student.name);
};

//Save Button Event that Initiates Above Function
var saveStudent = document.getElementById("save-name");
saveStudent.addEventListener("click", inputStudentName, false);


//Input of Student's Subject and Grade for that Subject.
//Will push into student.subjects Array.
//Creates Table Row and Adds Student Input for Subject and Grade
var getStudentSubject = function() {
    var studentSubject = document.getElementById("subject")
    var subjectGrade = document.getElementById("grade")
    student.addSubject(studentSubject.value, Number(subjectGrade.value))
    var newRow = document.createElement("tr");
    var newContent = "<td>" + studentSubject.value + "</td><td>" + subjectGrade.value + "</td>";
    newRow.innerHTML = newContent;
    table.insertBefore(newRow, table.firstChild);
   

    console.log(student.subjects);
};

//Event Button to Initiate Input of Subject and Grade Function
var addButton = document.getElementById("add-grade");
addButton.addEventListener("click", getStudentSubject, false);




// var finalAverage = average / student.subjects.length;

var calculateStudentAverage = function () {
    var printAverage = student.calculateAverage();
    document.getElementById("student-average").innerHTML = printAverage;
}

var calculateButton = document.getElementById("calculate-average");
calculateButton.addEventListener("click", calculateStudentAverage, false);


var studentStatus = function() {
    var printAverage = student.calculateAverage();
    var awesome = getElementById("student-awesome");
    var practice = getElementById("student-practice");
    if (printAverage > 80) {
        awesome.removeClass("hidden");
    } else {
        practice.removeClass("hidden");
    }
};

