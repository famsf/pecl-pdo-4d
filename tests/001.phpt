--TEST--
PDO_4D: Testing transaction
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$db->query('CREATE TABLE foobar (id INT)');

$db->query("INSERT INTO foobar VALUES (1)");
$db->query("INSERT INTO foobar VALUES (2)");

$r = $db->query('SELECT * FROM foobar');
var_dump($r->rowCount());

$db->query('DROP TABLE foobar');

?>
--EXPECTF--
int(2)
