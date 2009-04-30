--TEST--
PDO_4D: Testing table creation
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$db->query('CREATE TABLE IF NOT EXISTS foobar ( c TEXT )');

$r = $db->query('SELECT * FROM foobar');
var_dump($r->rowCount());

$db->query('DROP TABLE foobar');
?>
--EXPECTF--
int(0)
