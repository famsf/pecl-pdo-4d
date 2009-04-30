--TEST--
PDO_4D: stockage des images
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$db->setAttribute(PDO::FOURD_ATTR_PREFERRED_IMAGE_TYPES, 'jpg gif png');

$r = @$db->query('SELECT * FROM testImage');
$l = $r->fetchall();



foreach($l as $ligne) {
   print $ligne['type']." ".strlen($ligne['image'])."\n";
}

?>
--EXPECTF--
jpg 1523
png 7006
gif 3942
chaine vide 0