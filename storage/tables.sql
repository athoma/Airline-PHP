DROP TABLE IF EXISTS login;
CREATE TABLE IF NOT EXISTS login(
	empID INT,
	username VARCHAR(50),
	password VARCHAR(20),
	FOREIGN KEY(empID) REFERENCES employees(empID)
);
INSERT INTO login (empID,username,password)
VALUE(382901,'fcessna','1234');

DROP TABLE IF EXISTS equipment;
CREATE TABLE IF NOT EXISTS equipment(
	type VARCHAR(20) ,
	description VARCHAR(15),
	N_NUM VARCHAR(20) NOT NULL PRIMARY KEY,
	seat_capacity INT NOT NULL,
	pilot INT,
	attendant INT
);--pilot and attendant mean how many of them in a flight
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('B747','Boeing 747','N47892','300','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('B737','Boeing 737','N21094','180','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('MD80','McDonnell 80','N009','190','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('A380','Airbus 380','N3029','290','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('DC9','Douglas 9','N10998','150','1','2');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('B727','Boeing 727','N5674','150','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('A250','Airbus 250','N55521','175','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('B747','Boeing 747','N3847','300','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('B747','Boeing 747','N09982','300','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('B737','Boeing 737','N1029','180','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('A380','Airbus 380','N77837','290','2','3');
INSERT INTO equipment(type,description,N_NUM,seat_capacity,pilot,attendant)
VALUE('MD80','McDonnell 80','N77994','190','2','3');


DROP TABLE IF EXISTS custumer;
CREATE TABLE IF NOT EXISTS custumer(
	reservationID VARCHAR NOT NULL PRIMARY KEY,
	fname VARCHAR(30) NULL,
	lname VARCHAR(30) NULL
	);
INSERT INTO custumer(reservationID ,fname ,lname )
VALUE ('B4090','judy','trees');


DROP TABLE IF EXISTS employees;
CREATE TABLE IF NOT EXISTS employees(
	empID INT PRIMARY KEY,
	fname VARCHAR(45),
	lname VARCHAR(45),
	empType ENUM('pilot','attendant','admin'),
	certification VARCHAR(45),
	status ENUM('active','inactive'),
	totalHours INT,
	rank ENUM('first officer','captain','junior captain','senior captain', 'junior', 'senior')
	);
--certification is the airplan type
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (1,'jitdawan','pawanna','attendant',NULL,'active',2000,'junior');
INSERT INTO employees(empID ,fname,lname ,empType)
VALUE (2,'admin','','admin');
--pilots
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (382901,'Frank','Cessna','pilot','B747 B737','active',18730,'captain');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (388929,'Sue','Grumman','pilot','DC9 MD80','active',14799,'captain');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (483792,'John','Piper','pilot','MD80 L1011','inactive',11870,'first officer');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (887362,'Mark','Northup','pilot','B747 A380 B737','active',21226,'senior captain');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (123492,'Mary','Seneca','pilot','A380','active',19433,'senior captain');
--attendants
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (99872,'Cybil','Smith','attendant',NULL,'active',14309,'senior');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (372819,'Simon','Said','attendant',NULL,'active',2887,'junior');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (776573,'Janet','Johnson','attendant',NULL,'active',7654,'senior');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (111980,'Hillary','Trump','attendant',NULL,'active',13101,'senior');
INSERT INTO employees(empID ,fname,lname ,empType ,certification ,status ,totalHours ,rank)
VALUE (485932,'Donald','Clinton','attendant',NULL,'active',8876,'senior');


DROP TABLE IF EXISTS flight;
CREATE TABLE IF NOT EXISTS flight(
	operationDay DATETIME,
	flightID INT PRIMARY KEY,
	desCity VARCHAR(50),
	departCity VARCHAR(50),
	arriveTime DATETIME,
	departTime DATETIME,
	price FLOAT,
	pilots VARCHAR(50),
	attendants VARCHAR(50),
	N_NUM VARCHAR(20),
	FOREIGN KEY(N_NUM) REFERENCES equipment(N_NUM)
);--pilot is number pilot
INSERT INTO flight (operationDay,flightID,desCity,departCity,arriveTime,departTime,price,pilots,attendants,N_NUM)
VALUE('2016-11-19','454','DALLAS','PARIS','07:00:00','17:30:00',1129,'123492 887362','99872 485932 473829','N3029');
INSERT INTO flight (operationDay,flightID,desCity,departCity,arriveTime,departTime,price,pilots,attendants,N_NUM)
VALUE('2016-11-21','5540','PARIS','CHICAGO','16:00:00','05:00:00',899,'382901 887362','7765573 372819 485932','N47892');


DROP TABLE IF EXISTS reservation;
CREATE TABLE IF NOT EXISTS reservation(
	cusID INT,
	flightID INT,
	bags INT,
	FOREIGN KEY(cusID) REFERENCES custumer(reservationID),
	 FOREIGN KEY(flightID) REFERENCES flight(flightID)
);
INSERT INTO reservation(cusID,flightID,bags) VALUE(1,1150,1);


DROP TABLE IF EXISTS newuser;
CREATE TABLE IF NOT EXISTS newuser(
	username VARCHAR(15),
	password VARCHAR(15)

);
INSERT INTO newuser(username,password) VALUE("hello","itsme"),("back","together"),("blurred","Lines"),("idontlikeit","iloveit");
