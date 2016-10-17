import _ from 'lodash';

"""
A CoffeeScript sample.
"""

class Vehicle
  constructor: (@name) =>
  
  drive: () =>
    alert "Conducting #{@name}"

class Car extends Vehicle
  drive: () =>
    alert "Driving #{@name}"

c = new Car "Brandie"

yield

while notAtDestination()
  c.drive()

raceVehicles = (new Car for i in [1..100])

startRace = (vehicles) -> [vehicle.drive() for vehicle in vehicles]
regex = /Hello (\d+) #{user}/g
2 / 3
2/3
a = a /b /g
name="hello"
test=/// #{name}

fancyRegExp = ///
	(\d+)	# numbers
	(\w*)	# letters
	$		# the end
///
