--TEST--
PDO_4D: stockage des images
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

$im = @imagecreate(110, 20);

$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);

imagestring($im, 1, 5, 5,  "A Simple Test String", $text_color);
$image_path = "/tmp/test.4d.png";
imagepng($im,$image_path);

$db->query('CREATE TABLE test (id INT, img PICTURE )');

$image_q = fopen($image_path, "r");

$stmt = $db->prepare('INSERT INTO test VALUES (0, ?)');
$stmt->bindValue(1,$image_q,PDO::PARAM_LOB);
//$stmt->bindParam(1, $image_q); 

$stmt->execute();

$r = @$db->query('SELECT * FROM test');

$l = $r->fetchall();

$image = file_get_contents($image_path);
var_dump($l[0]['img'] == $image);

$db->query('DROP TABLE IF EXISTS test ');
unlink($image_path);

?>
--EXPECTF--
bool(true)