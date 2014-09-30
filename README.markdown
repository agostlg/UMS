===========

#UMS - User and role

--------
###Just fooling around, testing databases, architecture and composer packages.

Folder structure based on Uncle Bob arch: http://24.media.tumblr.com/tumblr_m7wjx4QuLX1qz82meo1_1280.png

This is not mean to be a finished work, not either a full implementation of any principle described by Uncle Bob, just for testing and fun.

----------
##Structure

in src you can find all source code (there is no UI), some tests can be found at the test folder.

Entities:

	User: id, name, is_admin
	Role: id, name
	UserRole: role_id, user_id

Interactors:

	User: add, delete (only by admin)
	Role: add, delete (only by admin)
	UserRole: add, delete (only by admin)

Autoloader is PSR-4

I have commited so far 2 database adapters (Mysql, Dummy)

 * Mysql adapter is using https://github.com/Respect/Relational
 * Dummy is a fake that always return success

----------
Running it

Make sure you have Mysql installed and go to src/Persistence/Persistence.php and change the credentials and server as you wish.

Considering that you have the server in localhost, **run init.sh**, this should create a database and create 3 tables (role, user, role_user)

**run composer install**

to run the tests just do:
**vendor/bin/phpunit test**