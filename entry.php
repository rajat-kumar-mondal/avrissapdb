<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="ss.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <style>
        .scr {
            margin: 4px, 4px;
            padding: 4px;
            width: 100%;
            height: 380px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }

        body {
            background-color: white;
            color: black;
        }

        .dark-mode {
            background-color: black;
            color: white;
        }

        table-header {
            position: sticky;
            top: 0;
        }

        .container-h {
            width: 100%;
            height: 350px;
            overflow: auto;
        }
    </style>
</head>


<body style="background-color: #F0F8FF;">
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
    <br><br><br><br>
    <?php
    require 'dbcon.php';
    $name = $_GET['id'];
    $idDetect = explode("AVR/I/SSAP", $name)[1];
    if ($idDetect > 0 && $idDetect < 492) {
        $sql = "SELECT * FROM `master` WHERE `master`.`AVR_I_SSAPDB_ID`='$name'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $AVRISSAPDBid = str_replace("/", "", $row['AVR_I_SSAPDB_ID']);
                $proteinName = $row['Peptide_name'];
                $length = $row['Length'];
                $source = $row['Source'];
                $org = $row['Source_organism'];
                $pubmed = $row['PubMed_ID'];
                $pe = $row['Validation'];
                $seq = $row['Sequence'];
                $pub = explode(";", $pubmed);
                $pubmed = $row['PubMed_ID'];
                $pdb = $row['PDB_ID'];
                $taxo = $row['Taxonomy'];
                $et = $row['Entry_type'];
                $drugbank = $row['DrugBank_ID']
    ?>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="text-end">
                                <button type="button" class="btn btn-info rounded-0" style="background-color: #F1F1F1; color: #5B616B; border: 1px solid #F1F1F1; border-radius: 0px;" data-bs-toggle="modal" data-bs-target="#myModal">
                                    Download
                                </button>
                            </div>
                            <div class="modal" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="background-color: #F0F8FF;">
                                        <div class="modal-header">
                                            <h4 class="modal-Protein Name">Download</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="background-color: #F0F8FF;">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm" style="font-weight: 500;">FASTA Format
                                                        <hr style="margin: 0">
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm" style="padding-left: 4%;">
                                                        <a href='files/<?= $AVRISSAPDBid ?>.fasta' style='text-decoration: none; color: #0071BC; border: 1px solid #0071BC; --bs-btn-padding-y: 0.230rem;' class="btn btn-secondary rounded-0 bg-light">Display</a>
                                                        <a href='files/<?= $AVRISSAPDBid ?>.fasta' style='text-decoration: none; color: #0071BC; border: 1px solid #0071BC; --bs-btn-padding-y: 0.230rem;' class="btn btn-secondary bg-light rounded-0 ms-2" download="">Download</a>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm" style="font-weight: 500;">Text Format
                                                        <hr style="margin: 0">
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm" style="padding-left: 4%;">
                                                        <a href='files/<?= $AVRISSAPDBid ?>.txt' style='text-decoration: none; color: #0071BC; border: 1px solid #0071BC; --bs-btn-padding-y: 0.230rem;' class="btn btn-secondary bg-light rounded-0">Display</a>
                                                        <a href='files/<?= $AVRISSAPDBid ?>.txt' style='text-decoration: none; color: #0071BC; border: 1px solid #0071BC; --bs-btn-padding-y: 0.230rem;' class="btn btn-secondary bg-light rounded-0 ms-2" download="">Download</a>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm" style="font-weight: 500;">Looking to Download a PDF of This Page?
                                                        <hr style="margin: 0">
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-sm mb-4" style="padding-left: 4%; font-size:small">
                                                        <i> Please use print functionality available in your browser and look for a save as PDF option.</i>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                chdir('./files');
                $fastaFile = fopen("$AVRISSAPDBid.fasta", "w") or die("UtW");
                fwrite($fastaFile, ">" . $row['AVR_I_SSAPDB_ID'] . "|$proteinName|$org\n");

                for ($i = 0; $i < strlen($seq); $i += 60) {
                    $slSeq = substr($seq, $i, 60);
                    fwrite($fastaFile, $slSeq . "\n");
                }
                fclose($fastaFile);

                $entrywrite = fopen("$AVRISSAPDBid.txt", "w") or die("UtW");
                fwrite($entrywrite, "ID    " . $row['AVR_I_SSAPDB_ID'] . "\n");
                fwrite($entrywrite, "ET    $et\n");
                fwrite($entrywrite, "PN    $proteinName\n");
                fwrite($entrywrite, "PL    $length" . " [Note: any special compound, if present in sequence, is not considered in length]\n");
                echo "<title>" . $row['AVR_I_SSAPDB_ID'] . " | $proteinName</title>";
                fwrite($entrywrite, "SR    $source\n");
                fwrite($entrywrite, "SO    $org\n");
                fwrite($entrywrite, "TX    $taxo\n");
                fwrite($entrywrite, "VL    $pe\n");
                fwrite($entrywrite, "XX\n");
                echo "

            <div class='container' >PEPTIDE SUMMARY</div>
            <div class='container' style='font-size: xxx-large; font-weight: 400'>";
                echo explode("(", str_replace("[", "(", $proteinName))[0];
                echo "</div>
            <div class='container' style='margin-top: 1%;'>
        <div class='row'>
            <div class='col-sm '>
                <table class='' style='width: 100%;'>
                    <tr style='border-bottom: 5px solid #3C005A;'>
                        <td style='font-size: xx-large;  color: #5B616B'>
                            1 General Description
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class='container mt-2 ' >
    <div class='row border border-2 pt-2 pb-2' style='width: 99%; margin-left: auto; margin-right: auto;'>
      <div class='col-sm'>
      <div><b style='font-weight: 500'>AVR/I/SSAPDB ID:</b> " . $row['AVR_I_SSAPDB_ID'] . "</div>
      <div class='pt-1'><b style='font-weight: 500'>Entry type:</b> $et</div>
      <div class='pt-1'><b style='font-weight: 500'>Peptide Name:</b> ";
                echo $proteinName;
                echo "
        <div class='pt-1'><b style='font-weight: 500'>Length:</b> $length <i style='font-size: small'>[Note: any special compound, if present in sequence, is not considered in length]</i></div>
      <div class='pt-1'><b style='font-weight: 500'>Source:</b> $source</div>
      <div class='pt-1'><b style='font-weight: 500'>Source Organism:</b> $org</div>
      <div class='pt-1'><b style='font-weight: 500'>Taxonomy:</b> $taxo</div>
      <div class='pt-1'><b style='font-weight: 500'>Validation:</b> $pe</div>      
      ";

                echo "</div>
      </div>
    </div>
  </div>
  
  <div class='container' style='margin-top: 2.7%;'>
        <div class='row'>
            <div class='col-sm '>
                <table class='' style='width: 100%;'>
                    <tr style='border-bottom: 5px solid #3C005A;'>
                        <td style='font-size: xx-large; color: #5B616B'>
                            2 Peptide Sequence
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class='container mt-2 ' >
    <div class='row border border-2 pt-2 pb-2' style='width: 99%; margin-left: auto; margin-right: auto;'>
      <div class='col-sm'>
      <div style='overflow-wrap: anywhere;'>";
                for ($i = 0; $i < strlen($seq); $i += 10) {
                    $slSeq = substr($seq, $i, 10);
                    $increase = $i + 10;
                    echo "<span style='font-family: Consolas;'>$slSeq</span>";
                }

                echo "
      <div><a href='./files/$AVRISSAPDBid.fasta' style='text-decoration: none;' class='bb'>FASTA format</a></div>
      </div>
      </div>
    </div>
  </div>
  <div class='container' style='margin-top: 2.7%;'>
        <div class='row'>
            <div class='col-sm '>
                <table class='' style='width: 100%;'>
                    <tr style='border-bottom: 5px solid #3C005A;'>
                        <td style='font-size: xx-large; color: #5B616B'>
                            3 Activity Information
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<div class='container mt-2 ' >
<div class='row border border-2' style='width: 99%; margin-left: auto; margin-right: auto;'>
<div class='col-sm mt-2'>";
                foreach (explode("; ", $row['Target_organism']) as $dt) {
                    fwrite($entrywrite, "TO    " . utf8_encode($dt) . "\n");
                }
                echo "<div style='text-align: justify'><b class='mt-1' style='font-weight: 500;'>Target Organism: </b>" . utf8_encode($row['Target_organism']) . "</div>";
                foreach (explode("; ", $row['Inhibition_concentration']) as $dt) {
                    fwrite($entrywrite, "IC    " . utf8_encode($dt) . "\n");
                }
                echo "<div style='text-align: justify'><b class='mt-1' style='font-weight: 500;'>Inhibition Concentration: </b>" . utf8_encode($row['Inhibition_concentration']) . "</div>";
                foreach (explode("; ", $row['Toxicity_&_hemolytic_activity']) as $dt) {
                    fwrite($entrywrite, "TH    " . utf8_encode($dt) . "\n");
                }
                echo "<div style='text-align: justify; margin-bottom: 0.9%'><b class='mt-1' style='font-weight: 500;'>Toxicity & Hemolytic Activity: </b>" . utf8_encode($row['Toxicity_&_hemolytic_activity']) . "</div>";
                echo "</div>
</div>
</div>
<div class='container mt-1' >
<div class='row' style='width: 99%; margin-left: auto; margin-right: auto;'>
<div class='col-sm mt-1' style='font-size: smaller'>
<i style='padding-left: 1.5%'>Data manually curated from source article</i>
</div>
</div>
</div> 

  <div class='container' style='margin-top: 2.7%;'>
        <div class='row'>
            <div class='col-sm '>
                <table class='' style='width: 100%;'>
                    <tr style='border-bottom: 5px solid #3C005A;'>
                        <td style='font-size: xx-large; color: #5B616B'>
                            4 Database Cross-references
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<div class='container' style='margin-top: 0.6%;'>
<div class='row'>
    <div class='col-sm '>
        <table class='' style='width: 100%;'>
            <tr style='border-bottom: 3px solid #3C005A;'>
                <td style='font-size: x-large; color: #5B616B'>
                    4.1 Literature Database (for the source article(s))
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
<div class='container' style='margin-top: 1%;'>
<div class='row'>
    <div class='col-sm '>
        <table class='' style='width: 100%;'>
            <tr style='border-bottom: 2px solid #3C005A;'>
                <td style='font-size: larger; color: #5B616B'>
                    4.1.1 PubMed
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
<div class='container mt-2 ' >
<div class='row' style='width: 99%; margin-left: auto; margin-right: auto;'>";
                if ($pubmed == 'Not available') {
                    fwrite($entrywrite, "XR    PubMed: \n");
                    echo "<div class='col-sm' style='padding: 0.8% 0% 0.8% 0.8%; background-color: #F0F8FF; border-left: 5px solid red'>";
                    echo "No PMID available";
                    echo "</div>";
                } else {
                    if (count(explode(", ", $pubmed)) <= 4) {
                        echo "<div class='col-sm border border-2' style='padding: 0% 0.7% 0.8% 0.7%;'>";
                        $c = 1;
                        foreach (explode(",", str_replace(" ", "", $pubmed)) as $p) {
                            $sqll = "SELECT * FROM `avrsa_citation` WHERE pmid='$p'";
                            $resultt = $con->query($sqll);
                            if ($resultt->num_rows > 0) {
                                while ($roww = $resultt->fetch_assoc()) {
                                    $pid = $roww['pmid'];
                                    $ref = utf8_encode($roww['citation']);
                                    fwrite($entrywrite, "XR    PubMed: $pid\n");
                                    if (count(explode(", ", $pubmed)) != $c) {
                                        echo "
                    <div style='text-align: justify; padding-top: 0.8%;'><b style='font-weight: 500'>Citation $c: </b>$ref</div>
                    <div class='border-bottom border-2' ><b style='font-weight: 500; '>PMID: </b>
                    <a href='https://pubmed.ncbi.nlm.nih.gov/$pid/' style='text-decoration: none;' class='bb' target='_blank'>$pid</a>
                    </div>
                    ";
                                    } else {
                                        echo "
                    <div style='text-align: justify; padding-top: 0.8%;'><b style='font-weight: 500'>Citation $c: </b>$ref</div>
                    <div ><b style='font-weight: 500; '>PMID: </b>
                    <a href='https://pubmed.ncbi.nlm.nih.gov/$pid/' style='text-decoration: none;' class='bb' target='_blank'>$pid</a>
                    </div>
                    ";
                                    }
                                    $c += 1;
                                    break;
                                }
                                continue;
                            }
                        }
                        echo "</div>";
                    }
                    if (count(explode(", ", $pubmed)) > 4) {
                        echo "<div class='col-sm border border-2 scr' style='padding: 0% 0.7% 0.8% 0.7%;'>";
                        $c = 1;
                        foreach (explode(",", str_replace(" ", "", $pubmed)) as $p) {
                            $sqll = "SELECT * FROM `avrsa_citation` WHERE pmid='$p'";
                            $resultt = $con->query($sqll);
                            if ($resultt->num_rows > 0) {
                                while ($roww = $resultt->fetch_assoc()) {
                                    $pid = $roww['pmid'];
                                    $ref = utf8_encode($roww['citation']);
                                    fwrite($entrywrite, "XR    PubMed: $pid\n");
                                    if (count(explode(", ", $pubmed)) != $c) {
                                        echo "
                    <div style='text-align: justify; padding-top: 0.8%;'><b style='font-weight: 500'>Citation $c: </b>$ref</div>
                    <div class='border-bottom border-2' ><b style='font-weight: 500; '>PMID: </b>
                    <a href='https://pubmed.ncbi.nlm.nih.gov/$pid/' style='text-decoration: none;' class='bb' target='_blank'>$pid</a>
                    </div>
                    ";
                                    } else {
                                        echo "
                    <div style='text-align: justify; padding-top: 0.8%;'><b style='font-weight: 500'>Citation $c: </b>$ref</div>
                    <div ><b style='font-weight: 500; '>PMID: </b>
                    <a href='https://pubmed.ncbi.nlm.nih.gov/$pid/' style='text-decoration: none;' class='bb' target='_blank'>$pid</a>
                    </div>
                    ";
                                    }
                                    $c += 1;
                                    break;
                                }
                                continue;
                            }
                            $c += 1;
                        }
                        echo "</div>";
                    }
                }
                echo " 
</div>
</div> 

<div class='container' style='margin-top: 2%;'>
<div class='row'>
    <div class='col-sm '>
        <table class='' style='width: 100%;'>
            <tr style='border-bottom: 3px solid #3C005A;'>
                <td style='font-size: x-large; color: #5B616B'>
                4.2 3D Structure Databases
                </td>
            </tr>
        </table>
    </div>
</div>
</div>";
                if ($pdb == 'Not available') {
                    fwrite($entrywrite, "XR    RCSB PDB/PDBsum/PDBe/PDBj/PDBe-KB/MMDB: Not available \n");
                    echo "
                <div class='container mt-2' style='margin-top: 0%;'>
            <div class='row pt-2 pb-2' style='
            background-color: #F0F8FF; width: 99%; margin-left: auto; margin-right: auto; border-left: 5px solid red'>
                <div class='col-sm '>
                No PDB ID available
                </div>
            </div>
            </div>
                ";
                } else {
                    foreach (explode(", ", $pdb) as $dt) {
                        if (strlen($dt) > 3) {
                            fwrite($entrywrite, "XR    RCSB PDB/PDBsum/PDBe/PDBj/PDBe-KB/MMDB: $dt\n");
                        }
                    }
                ?>
                    <div id="pdb_ids" style="display: none">
                        <?php echo str_replace("_Z", "", str_replace("_Y", "", str_replace("_X", "", str_replace("_W", "", str_replace("_S", "", str_replace("_R", "", str_replace("_Q", "", str_replace("_C", "", str_replace("_P", "", str_replace("_O", "", str_replace("_N", "", str_replace("_M", "", str_replace("_L", "", str_replace("_K", "", str_replace("_J", "", str_replace("_I", "", str_replace("_H", "", str_replace("_G", "", str_replace("_F", "", str_replace("_E", "", str_replace("_D", "", str_replace("_c", "", str_replace("_B", "", str_replace("_A", "", $pdb)))))))))))))))))))))))); ?>
                    </div>
                    <div class="container mt-2">
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-responsive" style="width: 99%; margin-left: auto; margin-right: auto;">
                                    <table id="myDataTable" class="table border border-2 table-striped table-hover">
                                        <thead class="text-white bg-dark">
                                            <th>
                                            <td style="font-weight: 500;">Sl. no.</td>
                                            <td style="font-weight: 500;">PDB ID</td>
                                            <td style="font-weight: 500;">Chain</td>
                                            <td style="font-weight: 500; width: 20%;">Method</td>
                                            <td style="font-weight: 500;">Resolution</td>
                                            <td style="font-weight: 500; width: 40%;">Access Links</td>
                                            <td style="font-weight: 500;">3D View</td>
                                            </th>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php            }
                $uniprot = $row['UniProt_ID'];
                echo "
            <div class='container' style='margin-top: 2%;'>
<div class='row'>
    <div class='col-sm '>
        <table class='' style='width: 100%;'>
            <tr style='border-bottom: 3px solid #3C005A;'>
                <td style='font-size: x-large; color: #5B616B'>
                4.3 Protein Database
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
            <div class='container mt-2'>
            <div class='row pt-2 pb-2' style='
            background-color: #F0F8FF; width: 99%; margin-left: auto; margin-right: auto; border-left: 5px solid #e60073'>
                <div class='col-sm '><b style='font-weight: 500'>UniProt: </b>";
                if ($uniprot == 'Not available') {
                    echo "UniProt ID " . $uniprot;
                    fwrite($entrywrite, "XR    UniProt: $uniprot\n");
                } else {
                    $uplen = count(explode(", ", $uniprot));
                    $c___ = 1;
                    foreach (explode(", ", $uniprot) as $up) {
                        echo "<a href='https://www.uniprot.org/uniprotkb/$up/entry' style='text-decoration: none;' class='bb' target='_blank'>$up</a>";
                        fwrite($entrywrite, "XR    UniProt: $up\n");
                        if ($c___ < $uplen) {
                            echo ", ";
                            $c___ += 1;
                        }
                    }
                }
                echo "</div>
            </div>
            </div>
            <div class='container' style='margin-top: 2%;'>
            <div class='row'>
    <div class='col-sm '>
        <table class='' style='width: 100%;'>
            <tr style='border-bottom: 3px solid #3C005A;'>
                <td style='font-size: x-large; color: #5B616B'>
                4.4 Drug Database
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
            <div class='container mt-2'>
            <div class='row pt-2 pb-2' style='
            background-color: #F0F8FF; width: 99%; margin-left: auto; margin-right: auto; border-left: 5px solid #e60073'>
                <div class='col-sm '><b style='font-weight: 500'>DrugBank: </b>";
                if ($drugbank == 'Not available') {
                    echo "DrugBank ID " . $drugbank;
                    fwrite($entrywrite, "XR    DrugBank: $drugbank\n");
                } else {
                    $uplen = count(explode(", ", $drugbank));
                    $c___ = 1;
                    foreach (explode(", ", $drugbank) as $up) {
                        echo "<a href='https://go.drugbank.com/drugs/$up' style='text-decoration: none;' class='bb' target='_blank'>$up</a>";
                        fwrite($entrywrite, "XR    DrugBank: $up\n");
                        if ($c___ < $uplen) {
                            echo ", ";
                            $c___ += 1;
                        }
                    }
                }
                echo "</div>
            </div>
            </div>
        
";
            }
        }
        fwrite($entrywrite, "XX\n");
        fwrite($entrywrite, "SQ    SEQUENCE  \n");
        fwrite($entrywrite, "      ");
        $seccou = 10;
        for ($i = 0; $i < strlen($seq); $i += 10) {
            $slSeq = substr($seq, $i, 10);
            fwrite($entrywrite, "$slSeq ");
            if ($i > 0 and $seccou % 60 == 0) {
                fwrite($entrywrite, "\n");
                fwrite($entrywrite, "      ");
            }
            $seccou += 10;
        }
        fwrite($entrywrite, "\n//");
        fwrite($entrywrite, "\n\n");
        fclose($entrywrite);
    } else {
        ?>
        <div class='container' style='margin-top: 16%'>
            <div class='row bg-light p-2 m-2'>
                <div class='col-sm text-center p-2' style='font-family: Poppins, Arial, Helvetica, sans-serif; font-weight: 700; font-size:xx-large'>
                    INVALID ACCESSION
                    <br><span class='text-success' style='font-size: large'>Team AVR/I/SSAPDB</span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid fixed-bottom" style="background-color: #3C005A;">
        <div class="row">
            <div class="col-sm text-center text-white p-1" style="font-size: small;">
                © 2024, B&BL, DoAS, IIIT-A, India
            </div>
        </div>
    </div>
    <script>
        const pdb_id_div = document.getElementById('pdb_ids');
        const pdb_ids = pdb_id_div.textContent;
        console.log(pdb_ids);

        var table;
        var selectedData = [];
        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function() {
            var selectedData = [];
            table = $('#myDataTable').on('error.dt', function(e, settings, techNote, message) {
                    $("#error").html("");
                })
                .DataTable({
                    "ajax": {
                        "url": "data-pdb-info.php",
                        "type": "POST",
                        "data": {
                            "ids": pdb_ids
                        }
                    },
                    "columns": [,
                        {
                            "data": "sl",
                        },
                        {
                            "data": "id",
                            "render": function(data, type, row) {
                                return '<div style="vertical-align: middle;"><a style="text-decoration: none;" class="bb" href="https://www.rcsb.org/structure/' + data + '">' + data + '</a></div>';
                            },
                        },
                        {
                            "data": "chain",
                        },
                        {
                            "data": "method",
                            "render": function(data, type, row) {
                                return '<div style="overflow-wrap: anywhere">' + data + '</data>';
                            }
                        },
                        {
                            "data": "res",
                            "render": function(data, type, row) {
                                if (data == 'NA') {
                                    return ''
                                } else {
                                    return data
                                }
                            }
                        },
                        {
                            "data": "id",
                            "render": function(data, row, type) {
                                return "<a href='https://www.rcsb.org/structure/" + data + "' class='bb' target='_blank'>RCSB PDB</a> || <a href='https://www.ebi.ac.uk/thornton-srv/databases/cgi-bin/pdbsum/GetPage.pl?pdbcode=" + data + "' class='bb' target='_blank'>PDBsum</a><span> || <a href='https://www.ebi.ac.uk/pdbe/entry/pdb/" + data + "' class='bb' target='_blank'>PDBe</a> || <a href='https://pdbj.org/mine/summary/" + data + "'  class='bb' target='_blank'>PDBj</a> || <a href='https://www.ebi.ac.uk/pdbe/pdbe-kb/proteins/" + data + "' class='bb' target='_blank'>PDBe-KB</a> || <a href='https://www.ncbi.nlm.nih.gov/Structure/pdb/" + data + "' class='bb' target='_blank'>MMDB</a>";
                            },
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            "data": "id",
                            "render": function(data, type, row) {
                                return "<a style='text-decoration: none' class='bb' target='_blank' href='https://3dmol.csb.pitt.edu/viewer.html?pdb=" + data + "&select=chain:A&style=cartoon;stick:radius~0.1&select=chain:B&style=cartoon;line&select=resi:19,23,26;chain:B&style=cartoon;stick&select=resi:19,23,26;chain:B&labelres=backgroundOpacity:0.8;fontSize:14'>View</a>";
                            },
                            "orderable": false,
                            "searchable": false

                        }
                    ],
                    "columnDefs": [{
                            "targets": 0,
                            "className": "dt-head-blue"
                        },
                        {
                            "orderable": false,
                            "targets": [0]
                        }
                    ],
                    "order": [],
                    "pageLength": 10,
                    "rowCallback": function(row, data) {
                        var checked = selectedData.includes(data['sl']) ? true : false;
                        $(row).find('.select-row').prop('checked', checked);
                    }
                });
            const recordsInfo = document.getElementById("records-info");
            table.on("draw.dt", function() {
                const pageInfo = table.page.info();
                const totalRecords = pageInfo.recordsTotal;
                const displayedRecords = pageInfo.recordsDisplay;
                recordsInfo.textContent = `${ totalRecords }`;
            });
            $('#select-all').on('click', function() {
                if ($(this).is(':checked')) {
                    $('.select-row').prop('checked', true);
                    var data = table.rows().data().toArray();
                    selectedData = data.map(function(item) {
                        return item['sl'];
                    });
                    table.rows().select();
                } else {
                    $('.select-row').prop('checked', false);
                    selectedData = [];
                    table.rows().deselect();
                }
            });
            $(document).on('click', '.select-row', function() {
                var rowData = $(this).val();
                if ($(this).is(':checked')) {
                    selectedData.push(rowData);
                    table.rows({
                        search: 'applied'
                    }).select();
                } else {
                    var index = selectedData.indexOf(rowData);
                    if (index > -1) {
                        selectedData.splice(index, 1);
                    }
                    table.rows({
                        search: 'applied'
                    }).deselect();
                }
            });
        });
    </script>
</body>

</html>