--TEST--
PDO_4D: Test de récupération des images 
--INI--
pdo_4d.timeout = 3
pdo_4d.prefered_image_types = png
--FILE--
<?php
require dirname(__FILE__) . '/../../../ext/pdo/tests/pdo_test.inc';
$db = PDOTest::test_factory(dirname(__FILE__) . '/common.phpt');

$tests_types = array( array('png'),
/*
                      array('gif','png'),
                      array('gif','jpg'),
                      array('jpg','png'),
                      array('jpg'),
                      array('gif'),
                      array('gif','png','jpg'),
                      */
);
//


foreach($tests_types as $types) {

    $r = @$db->query('SELECT image, type FROM testImage');
    $l = $r->fetchall();

    $retour = array();
    foreach($l as $ligne) {
        if (in_array($ligne['type'], $types)) {
            $retour[] = $ligne['type'];
        }
    }
    
    //print_r($l);

    var_dump(count(array_diff($retour, $types)) or count(array_diff($types, $retour)));
}

?>
--EXPECTF--
bool(false)
