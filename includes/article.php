<?php

	Class Article {
		public function fetchAll() {
			global $db;

			$sqlQuery = $db->query("SELECT * FROM articles");
			$sqlQuery->execute();

			return $sqlQuery->fetchAll();
		}

		public function fetchData($intId)
		{
			global $db;

			$sqlQuery = $db->prepare("SELECT * FROM articles WHERE article_id = ?");
			$sqlQuery->bindValue(1, $intId);
			$sqlQuery->execute();

			return $sqlQuery->fetch();
		}
	}

?>