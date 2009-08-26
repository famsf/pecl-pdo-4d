--TEST--
PDO_4D: Test de la récupération d'images
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip no PDO');
if (!extension_loaded('pdo_4d')) die('skip no PDO for 4D extension');
if (!extension_loaded('gd')) die('skip gd not available');

$gd_info = gd_info();
$gd_info['JPEG Support'] = '';

if ($gd_info['JPEG Support'] != 1) &&
    $gd_info['JPG Support'] != 1) ) 
            die('skip jpeg not available');


require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';

PDOTest::skip();
?>
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
