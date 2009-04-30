--TEST--
PDO_4D: Récupération d'une colonne
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$db->query("CREATE TABLE test ( a VARCHAR, b VARCHAR, c VARCHAR )");
$db->query("INSERT INTO test VALUES ( 'a1','b1','c1')");
$db->query("INSERT INTO test VALUES ( 'a','b','c')");
$db->query("INSERT INTO test VALUES ( 'a2','b2','c2')");

//$r = $db->query("SELECT a FROM test");
$r = $db->prepare("SELECT a FROM test");
$r->execute();

$x1 = $r->fetchall(PDO::FETCH_COLUMN, 0);
//$x2 = $r->fetchall(PDO::FETCH_COLUMN,1);

$db->query('DROP TABLE test');

print_r($x1);
?>
--EXPECTF--
Array
(
    [0] => a1
    [1] => a
    [2] => a2
)