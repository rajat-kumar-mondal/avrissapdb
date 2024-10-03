<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="ss.css">
    <title>AVR/I/SSAPDB - Custom Report</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container-c {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 70%;
        }
    </style>
    <script>
        function startDownload() {
            setTimeout(function() {
                var link = document.createElement('a');
                link.href = 'AVR_I_SSAPDB-custom-report.tsv';
                link.download = 'AVR_I_SSAPDB-custom-report.tsv';
                link.click();
            }, 500);
        }
    </script>
</head>

<body onload="startDownload()" style="background-color: #F0F8FF;">
    <nav class="navbar navbar-expand-sm navbar-dark  fixed-top" style="background-color: #3C005A;">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="AVRISSAPDB-home">AVR/I/SSAPDB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="AVRISSAPDB-search">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-browse-all-data">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-statistics">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-download">Downloads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-news">News/Updates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="developers">Developers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-tutorial">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <?php
    require 'dbcon.php';
    $ids = explode(",", $_POST["ids"]);
    $colHeader = str_replace("%7C", "|", str_replace("%29", ")", str_replace("%28", "(", str_replace("+", " ", str_replace("%60", "`", str_replace("%2C", ",", str_replace("datareq=", "", $_POST["myDataset"])))))));
    $format = str_replace("fmt=", "", $_POST["myFormat"]);
    $tsvHeader = '';
    if (strlen($colHeader) == 0) {
        $colHeader = "'AVR_I_SSAPDB_ID', 'Entry_type', 'Peptide_name', 'Sequence', 'Length', 'Source', 'Source_organism', 'Taxonomy', 'Validation', 'Target_organism', 'Inhibition_concentration', 'Toxicity_&_hemolytic_activity', 'PubMed_ID', 'PDB_ID', 'UniProt_ID', 'DrugBank_ID'";
        $tsvHeader = $colHeader;
    } else {
        $tsvHeader = "`" . str_replace(",", "`, `", $colHeader) . "`";
        $colHeader = $tsvHeader;
    }
    $idArrLen = count($ids);
    if ($format == 'tsv') {
        $cc = 0;
        $tsvFile = fopen("AVR_I_SSAPDB-custom-report.$format", "w") or die("UtO");
        fwrite($tsvFile, str_replace("`", "", str_replace(", ", "\t", str_replace("'", "", $tsvHeader) . "\n")));
        $arr = array();
        for ($ia = 0; $ia < $idArrLen; $ia++) {
            array_push($arr, $ids[$ia]);
            if (($ia + 1) % 500 == 0) {
                $sql = str_replace("%26", "&", "SELECT " . str_replace("'", "`", $colHeader) . " FROM `master` WHERE AVR_I_SSAPDB_ID IN ('" . implode("','", $arr) . "')");
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    fwrite($tsvFile, str_replace("<br>", "; ", implode("\t", $row)) . "\n");
                }
                $arr = array();
            }

            if ($ia + 1 == $idArrLen) {
                if (($ia + 1) % 500 != 0) {
                    $sql = str_replace("%26", "&", "SELECT " . str_replace("'", "`", $colHeader) . " FROM `master` WHERE AVR_I_SSAPDB_ID IN ('" . implode("','", $arr) . "')");
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        fwrite($tsvFile, str_replace("<br>", "; ", implode("\t", $row)) . "\n");
                    }
                    $arr = array();
                }
            }
        }
        fclose($tsvFile);
    }
    $con->close();
    ?>
    <div class="container-c text-center" style="background-color: #F0F8FF; ">
        <div style="font-size: x-large; font-weight: 500; width: 90%; margin-left: auto; margin-right: auto; color: #3C005A;">Report Created Successfully
            <br>
            <div class="text-success" style="font-size: large; margin-top: 0.5%">Report will start to download in a few seconds...</div>
            <div style="font-size: medium; margin-top: 1%; padding-left: 1%; padding-right: 1%;"><span style="color: #3C005A;">Download not starting??</span> <span class="text-success"> Try this </span><a class="bb" style="text-decoration: none;" href="AVR_I_SSAPDB-custom-report.tsv" download>direct download link</a></div>
            <div style="font-size: medium; margin-top: 0.1%">Click on <a href="display-report" class="bb" style="text-decoration: none;">view report</a> to view</div>
        </div>
    </div>
    <br><br><br>
    <div class="container-fluid fixed-bottom" style="background-color: #3C005A;">
        <div class="row">
            <div class="col-sm text-center text-white p-1" style="font-size: small;">
                © 2024, B&BL, DoAS, IIIT-A, India
            </div>
        </div>
    </div>
</body>

</html>