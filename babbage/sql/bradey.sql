set search_path = "public";

DROP TABLE IF EXISTS buildings, site_user, rooms, reservations, features CASCADE ;

CREATE TABLE buildings (
                building_id SERIAL NOT NULL,
                name VARCHAR(60) NOT NULL,
                /*coordinate*/
                address VARCHAR(60) NOT NULL,
                open_hours INTEGER NOT NULL,
                close_hours INTEGER NOT NULL,
                PRIMARY KEY (building_id)
);

CREATE TABLE site_user (
				username VARCHAR(30) NOT NULL, --want to make unique
				isAdmin BOOLEAN,
				password VARCHAR(30) NOT NULL,
				PRIMARY KEY (username)
);

CREATE TABLE rooms (
				room_id SERIAL NOT NULL,
				/*building_id*/
				room_name VARCHAR(30) NOT NULL,
				capactiy INTEGER NOT NULL,
				-- features
				reserved varchar(20) DEFAULT 'Open',
				PRIMARY KEY (room_id)
);

CREATE TABLE reservations (
				-- //room_id
				-- //username
				start_time INTEGER NOT NULL, --want to make unique
				end_time INTEGER NOT NULL --want to make unique
				
);

CREATE TABLE features (
				feature_id SERIAL NOT NULL,
				feature VARCHAR(30) NOT NULL
);