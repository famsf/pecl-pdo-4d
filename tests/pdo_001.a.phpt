--TEST--
PDO_4D: tests des exceptions lancées
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip');
$dir = getenv('REDIR_TEST_DIR');
//if (false == $dir) die('skip no driver');
require_once $dir . 'pdo_test.inc';
PDOTest::skip();
?>
--FILE--
<?php
if (getenv('REDIR_TEST_DIR') === false) putenv('REDIR_TEST_DIR='.dirname(__FILE__) . '/../../pdo/tests/');
require_once getenv('REDIR_TEST_DIR') . 'pdo_test.inc';
$db = PDOTest::factory();

@$db->exec('Erreur SQL flagrante');
$erreur = $db->errorInfo();

print "sqlstate : ".$erreur[0]."\n";
print "code     : ".$erreur[1]."\n";
print "message  : ".$erreur[2]."\n";

?>
--EXPECT--
sqlstate : 42601
code     : 1301
message  : Failed to parse statement.