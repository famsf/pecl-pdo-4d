--TEST--
PDO 4D: timeout connexoin
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip');
//$dir = getenv('REDIR_TEST_DIR');
//if (false == $dir) die('skip no driver');
//require_once $dir . 'pdo_test.inc';
//PDOTest::skip();
?>
--INI--
pdo_4d.timeout=10
pdo_4d.preferred_image_types=png
--FILE--
<?php

var_dump( ini_get('pdo_4d.timeout'));
var_dump( ini_get('pdo_4d.preferred_image_types'));

?>
--EXPECT--
string(2) "10"
string(3) "png"