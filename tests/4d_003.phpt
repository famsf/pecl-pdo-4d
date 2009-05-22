--TEST--
PDO 4D: Unicode Field Names
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip');
if (!interface_exists('Serializable')) die('skip no Serializable interface');
$dir = getenv('REDIR_TEST_DIR');
//if (false == $dir) die('skip no driver');
require_once $dir . 'pdo_test.inc';
PDOTest::skip();
?>
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');
$db->setAttribute(PDO::FOURD_ATTR_CHARSET, 'UTF-8');
mb_internal_encoding("UTF-8");

$data = file(dirname(__FILE__) . '/test.data');
$x = array();
for ($i = 0;$i < 21; $i++) {
    $l = mb_strlen($data[$i]);
    for($j = 0; $j < 300; $j++) {
    	$field = mb_substr($data[$i],$j,1);//mb_strlen($data[$i])-5);
    	
    	if (empty($field)) { continue;}
	    $req = "CREATE TABLE X ([$field] INT);";
    	print "$req\n";
	    $db->query($req);

    	$req = "INSERT INTO X ([$field]) VALUES ($i);";
	    print "$req\n";
    	$db->query($req);

	    $q = $db->prepare("SELECT [$field] FROM X");
    	$q->execute();

	    $x[$i] = $q->fetch(PDO::FETCH_NUM);
    	$db->query("DROP TABLE X;");
    }
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
