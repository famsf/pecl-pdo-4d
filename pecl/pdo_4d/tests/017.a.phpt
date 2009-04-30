--TEST--
PDO_4D: Testing de la récupération d'images
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

// il faut avoir la table testImage, avec les images deja crées
//$db->query('CREATE TABLE foobar (id INT)');

$r = $db->query('SELECT * FROM testImage')->fetchAll();
//var_dump($r);

$img = imagecreatefromstring($r[0]['image']);

var_dump($img);

?>
--EXPECTF--
resource(8) of type (gd)