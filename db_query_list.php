<?php
$ids = str_replace("undefined", "", $_POST['ids']);
chdir('./files/');
$myArray = array();
$clinical = '';
$non_clinical = '';
foreach (explode(",", $ids) as $id) {
    $myEle = explode("FCS", $id);
    if (count($myEle) == 2) {
        array_push($myArray, $myEle[1]);
        $clinical = 1;
    }
    if (count($myEle) != 2) {
        array_push($myArray, explode("AVR/I/SSAP", $id)[1]);
        $non_clinical = 1;
    }
}
sort($myArray);
if ($clinical == 1) {
    foreach ($myArray as $myid) {
        echo "AVR/I/SSAP" . $myid . "\n";
    }
}
if ($non_clinical == 1) {
    foreach ($myArray as $myid) {
        echo "AVR/I/SSAP" . $myid . "\n";
    }
}
