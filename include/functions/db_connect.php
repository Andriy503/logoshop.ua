<?php 

	class Connect {
		static $connect;
		static $sql;
		static $name = "category";
	}

	class App {
		function __construct() {
			$this->connect_db();
		}

		function connect_db() {
			Connect::$connect = new PDO("mysql:host=localhost;dbname=db_logoshop", "root", "");
			if(Connect::$connect){
			}else {
				echo "Неможливо підлючитись до БД, будь ласка перевірте з'єднання";
				die();
			}
		}
	}
	new App();
?>