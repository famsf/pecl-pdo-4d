--TEST--
PDO Common: Reprise apres erreur
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

var_dump($db->exec('INSERT INTO test values (1)'));

var_dump(@$db->exec('INSERT INTO test values (2,3,4);'));

var_dump($db->exec('INSERT INTO test values (2);'));

$r = $db->prepare("SELECT id FROM test");
$r->execute();

$x1 = $r->fetchall();

print_r($x1);

$db->exec('DROP TABLE test');

?>
--EXPECT--
int(1)
bool(false)
int(1)
Array
(
    [0] => Array
        (
            [id] => 1
            [0] => 1
        )

    [1] => Array
        (
            [id] => 2
            [0] => 2
        )

)