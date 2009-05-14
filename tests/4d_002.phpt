--TEST--
PDO 4D: Unicode Table Names
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');
$db->setAttribute(PDO::FOURD_ATTR_CHARSET, 'UTF-8');
mb_internal_encoding("UTF-8");

$data = file(dirname(__FILE__) . '/test.data');
$x = array();
for ($i = 0;$i < 5; $i++) {
	$table = mb_substr($data[$i],0,mb_strlen($data[$i])-5);
	$db->query("CREATE TABLE [$table] (field1 INT32, field2 VARCHAR, field3 BOOLEAN);");
	$db->query("INSERT INTO [$table] (field1,field2,field3) VALUES (1, 'ok', true);");
	$q = $db->prepare("SELECT field1,field2,field3 FROM [$table]");
	$q->execute();
	$x[$i] = $q->fetch(PDO::FETCH_NUM);
	$db->query("DROP TABLE [$table];");
}
print_r($x);
?>
--EXPECTF--
Array
(
    [0] => Array
        (
            [0] => 1
            [1] => ok
            [2] => true
        )

    [1] => Array
        (
            [0] => 1
            [1] => ok
            [2] => true
        )

    [2] => Array
        (
            [0] => 1
            [1] => ok
            [2] => true
        )

    [3] => Array
        (
            [0] => 1
            [1] => ok
            [2] => true
        )

    [4] => Array
        (
            [0] => 1
            [1] => ok
            [2] => true
        )

)
