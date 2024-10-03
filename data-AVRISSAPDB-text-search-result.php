<?php
require "dbcon.php";
$filtervalues = $_POST['term'] ?? '';
$lowerf = strtolower($filtervalues);
$upperf = strtoupper($filtervalues);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT `AVR_I_SSAPDB_ID`, `Entry_type`, `Peptide_name`, `Length`, `Source_organism`, `Target_organism`, `Validation` FROM `master` WHERE 
`AVR_I_SSAPDB_ID` LIKE '$filtervalues' OR 
`Target_organism` LIKE '%$filtervalues%' OR 
`Target_organism` LIKE '%$lowerf%' OR 
`Target_organism` LIKE '%$upperf%' OR 
`Entry_type` LIKE '%$upperf%' OR 
`Peptide_name` LIKE '%$filtervalues%' OR 
`Peptide_name` LIKE '%$lowerf%' OR 
`Peptide_name` LIKE '%$upperf%' OR 
`Sequence` LIKE '%$filtervalues%' OR 
`Sequence` LIKE '%$lowerf%' OR 
`Sequence` LIKE '%$upperf%' OR 
`Source` LIKE '%$filtervalues%' OR 
`Source` LIKE '%$lowerf%' OR 
`Source` LIKE '%$upperf%' OR 
`Source_organism` LIKE '%$filtervalues%' OR 
`Source_organism` LIKE '%$lowerf%' OR 
`Source_organism` LIKE '%$upperf%' OR 
`Taxonomy` LIKE '%$filtervalues%' OR 
`Taxonomy` LIKE '%$lowerf%' OR 
`Taxonomy` LIKE '%$upperf%' OR 
`Validation` LIKE '%$filtervalues%' OR 
`Validation` LIKE '%$lowerf%' OR 
`Validation` LIKE '%$upperf%' OR 
`UniProt_ID` LIKE '%$filtervalues%' OR 
`PDB_ID` LIKE '%$filtervalues%' OR 
`DrugBank_ID` LIKE '%$filtervalues%' OR 
`PubMed_ID` LIKE '%$filtervalues%' 
";
// echo $sql;
$result = $con->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(array("data" => $data));
$con->close();
