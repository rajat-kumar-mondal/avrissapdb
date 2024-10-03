<?php
require "dbcon.php";
$name1 = $_POST['query1'] ?? '';
$name2 = str_replace(" TO ", " AND ", $_POST['query2'] ?? '');
$name3 = $_POST['query3'] ?? '';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT `AVR_I_SSAPDB_ID`, `Entry_type`, `Peptide_name`, `Length`, `Source_organism`, `Target_organism`, `Validation` FROM `master` WHERE $name1 $name3 $name2";
// echo $sql;
$result = $con->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(array("data" => $data));
$con->close();
