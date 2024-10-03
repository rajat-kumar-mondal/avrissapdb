<?php
require "dbcon.php";
$sql = "INSERT INTO web (count) VALUES (1)";
$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="AVRISSAPDB.css">
    <title>AVR/I/SSAPDB Home Page</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
</head>

<body style="background-color: #F0F8FF; color:#192734">
    <nav class="navbar navbar-expand-sm navbar-dark  fixed-top" style="background-color: #3C005A;">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="#">AVR/I/SSAPDB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AVRISSAPDB-search">Search</a>
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
    <div class="container-c text-center" style="background-color: #F0F8FF; color: #192734;">
        <div style="font-size: xx-large; font-weight: 500;">Welcome to <u>A</u>nti-<u>V</u>ancomycin-<u>R</u>esistant/<u>I</u>ntermediate/<u>S</u>usceptible <i><u>S</u>taphylococcus <u>a</u>ureus</i> <u>P</u>eptide <u>D</u>ata<u>b</u>ase (AVR/I/SSAPDB)
            <br>
            <span style="font-size: large; font-weight: 500;">A Comprehensive & Specialised Knowledgebase of Anti-Microbial Peptides (AMPs) to Combat VRSA, VISA, and VSSA</span>
            <br>
            <div style="font-size: medium; font-weight: 500; margin-top: 1%; text-align: justify;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm mt-1">
                            <div style="padding-left: 7.5%; padding-right: 7.5%;">
                                <i>AVR/I/SSAPDB is a comprehensive archive of manually curated <u>A</u>nti-<u>V</u>ancomycin-<u>R</u>esistant/<u>I</u>ntermediate/<u>S</u>usceptible <i><u>S</u>taphylococcus <u>a</u>ureus</i> <u>P</u>eptides (AVR/I/SSAPs). AVR/I/SSAPs is a type of AMPs, which can be specifically used to target VR/I/SSA. The knowledgebase contain information about the AVR/I/SSAPs, their name, sequence, length,
                                    source, source organism, validation, target VR/I/SSA strain (with clinical information), toxicity & hemolytic activity. The knowledgebase holds the information of 491 AVR/I/SSAPs. The knowledgebase is also cross-referenced with it's source database i.e., PubMed along with PDB, UniProt, and DrugBank. This resource will help researchers or pharmaceutical
                                    industries to retrive information about various AVR/I/SSAPs and their details for further studies like peptide-based drug development against VR/I/SSA, ML model development for VR/I/SSA prediction, etc.</i>
                                <br><br>
                                We will keep this site online, updated and regularly maintained.
                                The database was last updated on 2024-07-14.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="container-fluid fixed-bottom">
        <div class="row">
            <div class="col-sm text-center text-white p-3" style="font-size: small; background-color: #3C005A;">
                Developed & Maintained by Biochemistry & Bioinformatics Lab (B&BL), Department of Applied Sciences (DoAS), Indian Institute of Information Technology, Allaha​bad (IIIT-A), UP 211015, India
                <br>
                © 2024, B&BL, DoAS, IIIT-A, India
                <br>
                Visitor Count: <?php
                                $query = "SELECT COUNT(`id`) FROM `web`";
                                $runQ = $con->query($query);
                                print_r($runQ->fetch_assoc()['COUNT(`id`)']);
                                $con->close();
                                ?> (Since 2024-07-14 07:29:10)
            </div>
        </div>
    </div>

</body>

</html>