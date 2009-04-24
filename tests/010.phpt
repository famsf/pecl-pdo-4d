--TEST--
PDO_4D: stockage des images
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$r = @$db->query('SELECT * FROM testImage');
$l = $r->fetchall();

print_r($l);

?>
--EXPECTF--
