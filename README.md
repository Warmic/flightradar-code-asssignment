## Task assignment

### Given task:

The goal of this assignment is to create a minimal airplane ticket reservation system as an API. You are free to change / improve features,
as well as implement more features you feel should benefit the system.

Implement a minimal and useful API for an airplane ticket management system. This management system is a service used by 3rd party systems.

One airplane ticket should contain flight departure time, source and destination airport as well as passenger seat which should be a random
number (between 1 and 32) per flight and passenger's passport ID.

The API should support following operations:

Create new Ticket
Cancel Ticket
Bonus task: ability to change seat for a given ticket

## [You can find documentation here](public/documentation.yaml)

To view it properly, either paste its content here https://editor.swagger.io/ or open file located at (public/documentation.yaml) via IDE
and use plugin to render it

## How to set up application

To install packages

```
make composer
```

To install packages and start containers. Server will be available at localhost:80

```
make setup
```

To seed database

```
make seed
```

To run tests

```
make tests
```