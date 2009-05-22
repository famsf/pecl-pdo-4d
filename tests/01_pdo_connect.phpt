--TEST--
PDO_4D: Test de connexion
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


//echo "DSN: $dsn<br>\n";
try {
       $db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');
       echo "PDO object created!\n";
} catch (PDOException $e) {
       echo 'Connection failed: ' . $e->getMessage()."<br/>\n";
}
//echo "<br>\n";
?>
--EXPECTF--
PDO object created!
