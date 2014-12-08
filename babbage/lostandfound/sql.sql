CREATE TABLE lost (
	id serial NOT NULL,
	entryUser varchar(20) NOT NULL,
	name varchar(30) NOT NULL,
	item_type varchar(10),
	location varchar(30) NOT NULL,
	status varchar(4) DEFAULT 'Lost',
	foundBy varchar(20),
	dateLost date NOT NULL,
	color varchar(20) NOT NULL,
	PRIMARY KEY (id)
);
