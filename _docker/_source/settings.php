<?php
	/* 
		 ____  __  __  ___  ____  ____  ___  _   _ 
		(  _ \(  )(  )/ __)( ___)(_  _)/ __)( )_( )
		 ) _ < )(__)(( (_-. )__)  _)(_ \__ \ ) _ ( 
		(____/(______)\___/(__)  (____)(___/(_) (_) www.bugfish.eu
				 ___ _   _ ___ _____ ___ ___ ___ ___ _  _ 
				/ __| | | |_ _|_   _| __| __|_ _/ __| || |
				\__ \ |_| || |  | | | _|| _| | |\__ \ __ |
				|___/\___/|___| |_| |___|_| |___|___/_||_|
		Copyright (C) 2024 Jan Maurice Dahlmanns [Bugfish]

		This program is free software: you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation, either version 3 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <https://www.gnu.org/licenses/>.	
		
		File Description:
			This settings.php file is configured to work with Docker and should not be modified unless by developers deploying new images.
	*/

	/* MySQL Settings */
		// MySQL Hostname, usually 'localhost' if your database is on the same server
		$mysql['host'] 		= "127.0.0.1";
		// MySQL Port, the default port for MySQL is 3306
		$mysql['port'] 		= '3306';
		// MySQL User, replace 'MYSQL_USER' with your actual MySQL username
		$mysql['user'] 		= "root";
		// MySQL Password, replace 'MYSQL_PASSWORD' with your actual MySQL password
		$mysql['pass'] 		= getenv('sf_db_pass');
		// MySQL Database, replace 'MYSQL_DATABASE' with the name of your database
		$mysql['db'] 		= "suitefish";
		// Prefix for MySQL tables, this is useful if you're sharing the database with other applications
		$mysql['prefix'] 	= 'sf_';

	/* Site Settings */
		// Cookie Prefix, used to uniquely identify the cookies for this application
		$object['cookie'] 	= 'sf_';
		// Full Path to the application's root directory on the server
		$object['path'] 	= '/var/www/html/';
		// Full URL to the site, change 'https://example' to your site's URL
		$object['url'] 		= getenv('sf_url');
		
	/* All Docker Instances should have this Constant set */
		if(!defined("_HIVE_IS_IN_DOCKER_")) { define("_HIVE_IS_IN_DOCKER_", true); }

	/* If a docker container is specialzed for a module, set the modules RNAME in this constant! */
		if(!defined("_HIVE_IS_IN_DOCKER_SPEC_")) { define("_HIVE_IS_IN_DOCKER_SPEC_", "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"); }
		
	/* Do not change below! */
		// Check if the core initialization file exists and require it if it does
		// This file likely contains code that initializes the application environment
		if(file_exists($object['path']."/_core/initialize.php")) {
			require_once($object['path']."/_core/initialize.php");
		} else { http_response_code(503); echo "Error at PATH in settings.php. Please check your configuration file."; }