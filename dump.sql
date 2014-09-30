CREATE DATABASE IF NOT EXISTS ums;
use ums;

CREATE TABLE IF NOT EXISTS user (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(48) NOT NULL,
	is_admin tinyint(1) DEFAULT 0,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS role_user (
	id int(11) NOT NULL AUTO_INCREMENT,
	role_id int(11) NOT NULL,
	user_id int(11) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS role (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(48) NOT NULL,
	PRIMARY KEY (id)
);

-- CREATE TABLE user (id_user INT AUTO_INCREMENT, name VARCHAR(48));
-- CREATE TABLE role_users (id_role_users INT AUTO_INCREMENT, fk_role INT, fk_user INT);
-- CREATE TABLE role (id_role INT AUTO_INCREMENT, name VARCHAR(48));
