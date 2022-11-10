# PHP Mars Rover Interview

### Core Backend Challenge Comments

It mainly uses OOP principles.
Objects for the example were created with constructors, getters, and setters.

The movement is performed by increasing or decreasing the x, and y values ​​depending on the current direction.

### General Comments
1. Using PHP7.4.

### Example
As per our requirement (created test cases), Assuming a top right grid input of x = 5 and y = 5 and two rovers with the following data:

Rover 1: 
    X-Axis Start: 1 
    Y-Axis Start: 2 
    Direction: N
    Move Commands: LMLMLMLMM

Rover 2: 
    X-Axis Start: 3
    Y-Axis Start: 3 
    Direction: E
    Move Commands: MMRMMRMRRM

You could expect to see the two rovers end up in the following positions and directions:

Rover 1: 1 3 N

Rover 2: 5 1 E

### Prerequisites

A web server capable of running PHP

A modern web browser


### Installing

1. make a clone of this application.
2. run 'composer install'.
3. run test.

## Running the tests

Test are run with [phpunit](https://phpunit.de/)

1. Open a terminal and navigate to the project root folder
2. Run the following command: `vendor/bin/phpunit --colors=always  tests/RoverTest.php`

Make a test using command line

1. Open a terminal and navigate to the project root folder
2. Run the following command: `php app/app.php`
3. add the input and can see the output like attached screenshot above.


## Authors

* **Afranconetti**
