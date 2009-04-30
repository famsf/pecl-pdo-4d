--TEST--
PDO_4D: 4D dans la liste des pilotes PDO
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$r = $ext=PDO::getAvailableDrivers();

var_dump(array_search('4D', $r) !== false);

?>
--EXPECTF--
bool(true)