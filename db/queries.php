<?
require_once 'connection.php';

function getImages(PDO $dbh){
	$sth = $dbh->prepare('SELECT * FROM Image WHERE is_main = 1');
	$sth->execute();
	$images = $sth;
	return $images->fetchAll();
}
?>
