(function(){
    "use strict";

    // TODO: Create person object
    // var person = todo;
    var person = {};

    // TODO: Create firstName and lastName properties in your person object; assign your name to them
    person.firstName = "John"
    person.lastName = "Hernandez"
    // TODO: Add a sayHello method to the person object that
    //       alerts a greeting using the firstName and lastName properties
    person.sayHello = function () {
    	alert("Hello from " + this.firstName + " " + this.lastName + "!");
    }
    // Say hello from the person object.
    person.sayHello();
    // person.sayHello();
})();
