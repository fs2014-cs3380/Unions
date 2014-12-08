
/*Tables  Bradey and I will be utilizing */

CREATE TABLE building (
  building_id    SERIAL PRIMARY KEY NOT NULL,
  name           VARCHAR(60)        NOT NULL,
/*coordinate*/
  address        VARCHAR(100),
  open_time      TIME,
  close_time     TIME,
  create_time    TIME,
  create_user_id INTEGER,
  update_time    TIMESTAMP,
  update_user_id INTEGER
);

INSERT INTO building (building_id, name, address, open_time, close_time, create_time, create_user_id, update_time, update_user_id)
	VALUES 
		(1, 'MU Student Center', '901 Rollins Rd, Columbia, MO 65211', '07:00', '24:00', 0, 0, 0, 0),
		(2, 'Memorial Student Union', 'Memorial Union, University of Missouri Columbia, MO 65201', '07:00', '24:00', 0, 0, 0, 0);

CREATE TABLE attraction (
  attraction_id SERIAL PRIMARY KEY NOT NULL,
  name           VARCHAR(100) NOT NULL,
  image_path VARCHAR(100),
  lim_id INTEGER,
  information_url VARCHAR(100),
  url_display_name VARCHAR(60),
  create_time TIMESTAMP, 
  create_user_id INTEGER,
  update_time    TIMESTAMP,
  update_user_id INTEGER
  building_id    INTEGER NOT NULL REFERENCES building
);

INSERT INTO attraction (attraction_id, name, image_path, lim_id, information_url, url_display_name, create_time, create_user_id, update_time, update_user_id, building_id)
	VALUES 
		(1, 'Wheatstone Bistro'		, '/attraction_images/wheatstoneBistro.jpg' , 0, 'http://dining.missouri.edu/hours' , 'View Hours', 0, 0, 0, 0, 2),
		(2, 'Starbucks Coffee'		, '/attraction_images/starbucks.png' , 0, 'http://dining.missouri.edu/hours' , 'View Hours', 0, 0, 0, 0, 2),
		(3, 'Craft Studio'		, '/attraction_images/craftstudio.jpg' , 0, 'http://craftstudio.missouri.edu/' , 'View Information', 0, 0, 0, 0, 2),
		


CREATE TABLE floor (
  floor_id       SERIAL  NOT NULL PRIMARY KEY,
  name           VARCHAR(40),
  building_id    INTEGER NOT NULL REFERENCES building,
  create_time    TIMESTAMP,
  create_user_id INTEGER,
  update_time    TIMESTAMP,
  update_user_id INTEGER
);

INSERT INTO floor (floor_id, name, building_id, create_time, create_user_id, update_time, update_user_id)
	VALUES 
		(1, 'Ground Floor', 1, 0, 0, 0, 0),
		(2, 'First Floor', 1, 0, 0, 0, 0),
		(3, 'Second Floor', 1, 0, 0, 0, 0),
		(4, 'Ground Floor', 2, 0, 0, 0, 0),
		(5, 'First Floor', 2, 0, 0, 0, 0),
		(6, 'Second Floor', 2, 0, 0, 0, 0),
		(7, 'Third Floor', 2, 0, 0, 0, 0);


CREATE TABLE event_space (
  event_space_id SERIAL      NOT NULL PRIMARY KEY,
  name           VARCHAR(45) NOT NULL,
  floor_id       INTEGER     NOT NULL REFERENCES floor,
  capactiy       INTEGER     NOT NULL,
  /*reserved       BOOLEAN DEFAULT FALSE -- This should be checked by start and end time and not stored in the database */
  image_path     VARCHAR(100),
  create_time    TIMESTAMP,
  create_user_id INTEGER,
  update_time    TIMESTAMP,
  update_user_id INTEGER
);


CREATE TABLE reservation (
  event_space_id INTEGER   NOT NULL REFERENCES event_space,
  user_id        INTEGER   NOT NULL REFERENCES "user",
  start_time     TIMESTAMP NOT NULL, --want to make unique
  end_time       TIMESTAMP NOT NULL, --want to make unique
  create_time    TIMESTAMP,
  create_user_id INTEGER,
  update_time    TIMESTAMP,
  update_user_id INTEGER
);

CREATE TABLE feature (
  feature_id     SERIAL      NOT NULL,
  floor_id INTEGER NOT NULL REFERENCES floor,    
  building_id INTEGER NOT NULL REFERENCES building,
  name           VARCHAR(45) NOT NULL,
  url            VARCHAR(150),
  event_space_id INTEGER , /* NULL is allowed so no foreign key */
  create_time    TIMESTAMP,
  create_user_id INTEGER,
  update_time    TIMESTAMP,
  update_user_id INTEGER
);
/* END RESERVATION TABLES */