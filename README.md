## Introduction

Kohana Settings module allows seamless integration of configuration items stored in database, into a Kohana application. The module does not expose any new API, method or classes (However, you can modify the model provided with the module for additional functionality).

The beauty of this module is that you can continue to use Kohana's flat file configuration, and put dynamically changing settings into database and use them transparently in your application. At any time if you want to use flat file config instead of using database, you can do so without modifying any application code at all. 

## Compatibility
- Compatible with Kohana version 3.1 and above

## Dependencies
- Kohana Database

## Usage
The module itself is so simple it does not require any documentation! All you need to do is:
- put the module inside your modules folder
- enable the module in your bootstrap
- create a settings table inside database
- add one of more records in the settings table
- use Kohana configuration API to use those configuration settings

### Table Schema
The basic table schema contains only two required fields. 'name' and 'value'. In it's simplest form, the schema is as follows:

						CREATE TABLE `settings` (
							`name` varchar(30) CHARACTER SET utf8 NOT NULL,
							`value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
							PRIMARY KEY (`name`)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;

Sample insert statements for the table (to show usage only):

					INSERT INTO `settings` (`name`,`value`) values ('app_version', '1.0');
					INSERT INTO `settings` (`name`,`value`) values ('app_title', 'My Website');

You can add as many fields as you desire to the settings table, based on your requirements. As long as these two fields are part of the table schema, the module will work without any problems.

### Usage Examples

To use the settings in your settings table, you only need to call Kohana's configuration API.

					echo Kohana::$config->load('settings.app_version');

### Adding Configuration data programmatically

The module does not provide any interface for adding/update configuration values in the database, however, the db model included in the package contains CRUD methods, which you can easily use to create a simple interface for the configuration data management.

