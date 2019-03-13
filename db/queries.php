<?
require_once 'connection.php';

function getImages(PDO $dbh){
	$sth = $dbh->prepare('SELECT * FROM Image');
	$sth->execute();
	$images = $sth;
	return $images->fetchAll();
}
?>
