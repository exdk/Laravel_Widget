<?php
try {
	$dbh = new PDO('mysql:dbname=alexavl1_wj;host=localhost', 'alexavl1_wj', 'R5p7*2H9');
} catch (PDOException $e) {
	die($e->getMessage());
}
?>