--TEST--
PDO_4D: Comptage de nombres de colonnes
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

$db->query('CREATE TABLE test (id INT)');

$db->query("INSERT INTO test VALUES (1)");
//$db->query("INSERT INTO test VALUES (2)");


$r = $db->query('SELECT * FROM test');
//$x = $r->fetch();
$x = $r->fetchall();

$db->query('DROP TABLE test');

print_r($x);
?>
--EXPECTF--
Array
(
    [0] => Array
        (
            [id] => 1
            [0] => 1
        )

)
