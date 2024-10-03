<?php require 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVR/I/SSAPDB Help</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link active" href="AVRISSAPDB-tutorial">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm text-center" style="margin-top: 2%;">
                <h4 style="font-weight: 500;">Help & Tutorial</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 border border-2 p-3" style="width: 85%;">
        <div class="row">
            <div class="col-sm">
                <div style="text-align: left;"><b style="font-weight: 500; font-size: larger;">AVR/I/SSAPDB Text Search
                        Facility</b></div>
                <div style="text-align: justify;">This is a generelized search facility.
                    This
                    search facility is case insensitive.
                    Here one can search with followings.
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    1. <b style="font-weight: 500;">AVRI/S/SAPDB ID </b> (e.g., AVR/I/SSAP10)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    2. <b style="font-weight: 500;">Entry Type</b> (e.g., Clinical or Non-clinical)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    3. <b style="font-weight: 500;">Peptide Name </b> (e.g.,
                    Melittin)</div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    4. <b style="font-weight: 500;">Source</b> (e.g., Bee venom)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    5. <b style="font-weight: 500;">Source Organism</b> (e.g., Apis mellifera)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    6. <b style="font-weight: 500;">Taxonomy</b> (e.g., Animalia)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    7. <b style="font-weight: 500;">Validation</b> (e.g., Experimentally validated)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    8. <b style="font-weight: 500;">Sequence </b> (e.g., GIGAVLKVLTTGLPALISWIKRKRQQ) <i style="font-size: xx-small;">[Note: This is not a BLAST search]</i></div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    9. <b style="font-weight: 500;">Target Organism </b> (e.g., VISA-9)</div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    10. <b style="font-weight: 500;">PubMed ID </b> (e.g., 34087287)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    11. <b style="font-weight: 500;">UniProt ID </b> (e.g., Q8LW54)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    12. <b style="font-weight: 500;">PDB ID</b> (e.g., 1BH1)
                </div>
                <div class="text-start" style="font-size: small; overflow-wrap: anywhere;">
                    13. <b style="font-weight: 500;">DrugBank ID</b> (e.g., DB10955)
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid mt-3 border border-2 p-3" style="width: 85%;">
        <div class="row">
            <div class="col-sm">
                <div style="text-align: left;"><b style="font-weight: 500; font-size: larger;">AVR/I/SSAPDB
                        Advanced Search
                        Facility</b></div>
                <div style="text-align: justify;">This is a advanced & specific search facility.
                    This
                    search facility is case insensitive.
                    Click on 'Add Field' to add a search field. In case of 'Range Attributes' integer and
                    float values are expected in search fields. An image of a build search query attached
                    below.
                </div>
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-sm text-center ">
                            <img class="border border-2" src="advanced-search.png" alt="image" height="auto" width="98%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3 border border-2 p-3" style="width: 85%;">
        <div class="row">
            <div class="col-sm">
                <div style="text-align: left;">
                    <div style="text-align: left;"><b style="font-weight: 500; font-size: larger;">3. Understand Text Format of AVR/I/SSAPDB database</b></div>
                    <div style="text-align: justify;" class="mb-2">
                        The text format of AVR/I/SSAPDB starts with two-character code followed by 4 blank space characters followed by the data.
                        Each line is kept 90 characters long for better readability of the data. The description of the two-character code is given below.
                    </div>
                    <?php
                    $sql = "SELECT * FROM idinfo";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div style='font-family: Consolas;'><?= $row['id'] ?> => <?= $row['det'] ?></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $con->close();
    ?>
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