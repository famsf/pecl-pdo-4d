--TEST--
PDO_4D: Comptage de nombres de colonnes
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$db->query('CREATE TABLE foobar ( a int, b int, c int )');
$db->query('insert into foobar values (1,2,3)');

$r = $db->query('SELECT * FROM foobar');
var_dump($r->columncount());

$db->query('DROP TABLE foobar');
?>
--EXPECTF--
int(3)
