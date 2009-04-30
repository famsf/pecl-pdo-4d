--TEST--
PDO Common: Test de la primary key
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip');
if (!extension_loaded('SPL')) die('skip SPL not available');
//$dir = getenv('REDIR_TEST_DIR');
//if (false == $dir) die('skip no driver');
require_once $dir . 'pdo_test.inc';
if (!class_exists('RecursiveArrayIterator', false)) die('skip Class RecursiveArrayIterator missing');
if (!class_exists('RecursiveTreeIterator', false) && !file_exists(getenv('REDIR_TEST_DIR').'../../spl/examples/recursivetreeiterator.inc')) die('skip Class RecursiveTreeIterator missing');
PDOTest::skip();
?>
--FILE--
<?php
if (getenv('REDIR_TEST_DIR') === false) putenv('REDIR_TEST_DIR='.dirname(__FILE__) . '/../../pdo/tests/'); 
require_once getenv('REDIR_TEST_DIR') . 'pdo_test.inc';
if (!class_exists('RecursiveTreeIterator', false)) require_once(getenv('REDIR_TEST_DIR').'ext/spl/examples/recursivetreeiterator.inc'); 

$db = PDOTest::factory();

$db->exec('CREATE TABLE test(id INT NOT NULL, primary key(id))');

$db->exec('INSERT INTO test values (1)');

$db->exec('DROP TABLE test');

$db->exec('CREATE TABLE test(id INT NOT NULL primary key)');

$db->exec('INSERT INTO test values (1)');

$db->exec('DROP TABLE test');

?>
--EXPECT--
