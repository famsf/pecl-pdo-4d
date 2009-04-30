--TEST--
PDO_4D: Test de récupération des images 
--INI--
pdo_4d.preferred_image_types = png
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

var_dump($db->getAttribute(PDO::FOURD_ATTR_PREFERRED_IMAGE_TYPES) == 'png');

$types = array('gif','png','jpg','tiff','psd','pdf','unknown');

foreach($types as $type) {
  print "$type\n";
  var_dump($db->setAttribute(PDO::FOURD_ATTR_PREFERRED_IMAGE_TYPES, $type));
  var_dump($db->getAttribute(PDO::FOURD_ATTR_PREFERRED_IMAGE_TYPES) == $type);

}

?>
--EXPECTF--
bool(true)
gif
bool(true)
bool(true)
png
bool(true)
bool(true)
jpg
bool(true)
bool(true)
tiff
bool(true)
bool(true)
psd
bool(true)
bool(true)
pdf
bool(true)
bool(true)
unknown
bool(true)
bool(true)