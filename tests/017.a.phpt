--TEST--
PDO_4D: Get image from PICTURE field (needs a testImage table with an 'image' PICTURE field with at least one reccord)
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip no PDO');
if (!extension_loaded('gd')) die('skip no GD');
if (!extension_loaded('pdo_4d')) die('skip no PDO for 4D extension');

require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
?>
--FILE--
<?php
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

//$db->query('CREATE TABLE foobar (id INT)');

$r = $db->query('SELECT * FROM testImage')->fetchAll();
//var_dump($r);

$img = imagecreatefromstring($r[0]['image']);

var_dump($img);

?>
--EXPECTF--
resource(%d) of type (gd)