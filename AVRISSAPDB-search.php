<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="AVRISSAPDB_clinical.js"></script>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>AVR/I/SSAPDB Text & Advanced Search</title>
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
            height: 100%;
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
    <div class="container" style="margin-top: 2%;">
        <div class="row">
            <div class="col-sm text-center" style="font-size: x-large; font-weight: 500;">AVR/I/SSAPDB Text
                Search</div>
        </div>
    </div>

    <div class="container-c text-center" style="height: 70%;">
        <div class="container">
            <div class="row">
                <div class="col-sm text-center mb-1">
                    <h1 style="font-weight: 500;">Find Anti-VR/I/SSA Peptide</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <form id="search-form" action="AVRISSAPDB-text-search-result" method="get">
                        <div class="pt-1" style="text-align: center;">
                            <input name="term" class="form-control" type="text" class="p-1 w-100" style="margin-left: auto; margin-right: auto; border-radius: 0%; width: 100%; padding: 0.8% 0.8% 0.8% 1.5%; border-radius: 0px; font-size: large;
                                    border: 2px solid gray;">
                        </div>
                        <div class="text-center" style="margin-top: 1%;">
                            <input type="submit" value="Search" name="search" class="btn-sm btn-primary" style="border-radius: 0px;">
                            &nbsp;
                            <button type="button" class="btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#myModal" style="border-radius: 0px;">
                                Help
                            </button>
                            &nbsp;
                            <button class="btn-sm btn-dark" style="border-radius: 0px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                                Advanced Search
                            </button>
                            &nbsp;
                            <button type="button" class="btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#myModal6" style="border-radius: 0px;">
                                AVR/I/SSAPs Source Organism List
                            </button>
                            &nbsp;
                            <button type="button" class="btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal3" style="border-radius: 0px;">
                                Target VR/I/SSA List
                            </button>
                            <div class="modal" id="myModal" style="border-radius: 0px;">
                                <div class="modal-dialog modal-xl" style="border-radius: 0px;">
                                    <div class="modal-content" style="border-radius: 0px;">
                                        <div class="modal-header" style="background-color: #3C005A; border-radius: 0px;">
                                            <p class="text-white" style="font-size: larger; font-weight: 500;">AVR/I/SSAPDB Help</p>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="background-color: #F0F8FF;">
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
                                        <div class="modal-footer" style="background-color: #F0F8FF;">
                                            <button type="button" class="btn-sm btn-danger" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="myModal3" style="border-radius: 0px;">
                                <div class="modal-dialog modal-lg" style="border-radius: 0px;">
                                    <div class="modal-content" style="border-radius: 0px;">
                                        <div class="modal-header" style="background-color: #3C005A; border-radius: 0px;">
                                            <p class="text-white" style="font-size: larger; font-weight: 500;">AVR/I/SSAPDB Targets Information</p>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="background-color: #F0F8FF;">
                                            <div style="text-align: left;"><b style="font-weight: 500; font-size: larger;">AVR/I/SSAPDB Targets List (Sorted in Ascending Order)</b></div>
                                            <div style="text-align: justify;">This is a list of all VR/I/SSA targets (total 205) that we currently have in this Database. Click on any target VR/I/SSA to view it's corresponding AVR/I/SSAPs.
                                            </div>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="text-white" style="background-color: #3C005A;">
                                                        <tr>
                                                            <th style="font-weight: 500;" class="text-center">Target Organisms</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        require "dbcon.php";
                                                        $sql = "SELECT * FROM `target` ORDER BY `target` ASC";
                                                        $result = $con->query($sql);
                                                        $c = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                            <tr>
                                                                <td><a href="AVRISSAPDB-text-search-result?term=<?= str_replace(" ", "+", $row['target']); ?>&search=Search" style="text-decoration: none;" class="bb"><?= $row['target']; ?></a></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.table').DataTable();
                                                });
                                            </script>
                                        </div>
                                        <div class="modal-footer" style="background-color: #F0F8FF;">
                                            <button type="button" class="btn-sm btn-danger" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="myModal6" style="border-radius: 0px;">
                                <div class="modal-dialog modal-lg" style="border-radius: 0px;">
                                    <div class="modal-content" style="border-radius: 0px;">
                                        <div class="modal-header" style="background-color: #3C005A; border-radius: 0px;">
                                            <p class="text-white" style="font-size: larger; font-weight: 500;">AVR/I/SSAPDB AVR/I/SSAPs Source Organism Information</p>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="background-color: #F0F8FF;">
                                            <div style="text-align: left;"><b style="font-weight: 500; font-size: larger;">AVR/I/SSAPDB AVR/I/SSAPs Source Organism List (Sorted in Ascending Order)</b></div>
                                            <div style="text-align: justify;">This is a list of all source organisms of AVR/I/SSAPs (total 59) that we currently have in this Database. Click on any source organism to view it's corresponding AVR/I/SSAPs.
                                            </div>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="text-white" style="background-color: #3C005A;">
                                                        <tr>
                                                            <th style="font-weight: 500;" class="text-center">Source Organism of AVR/I/SSAPs</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        require "dbcon.php";
                                                        $sql = "SELECT * FROM `source`";
                                                        $result = $con->query($sql);
                                                        $c = 1;
                                                        while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                            <tr>
                                                                <td><a href="AVRISSAPDB-text-search-result?term=<?= str_replace(" ", "+", $row['source']); ?>&search=Search" style="text-decoration: none;" class="bb"><?= $row['source']; ?></a></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $('.table').DataTable();
                                                });
                                            </script>
                                        </div>
                                        <div class="modal-footer" style="background-color: #F0F8FF;">
                                            <button type="button" class="btn-sm btn-danger" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid fixed-bottom" style="background-color: #3C005A;">
        <div class="row">
            <div class="col-sm text-center text-white p-1" style="font-size: small;">
                © 2024, B&BL, DoAS, IIIT-A, India
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" id="demo" style="width: 80%; z-index: 1800;">
        <div class="offcanvas-header" style="background-color: #3C005A;">
            <div class="offcanvas-title text-white" style="font-size: x-large;">AVR/I/SSAPDB Advanced Search</div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body" style="background-color: #F0F8FF;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm text-center">
                        <div style="font-weight: 500; font-size: large;">AVR/I/SSAPDB Advanced Search Query
                            Builder</div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="margin-top: 1.5%;">
                <div class="row">
                    <div class="col-sm text-end">
                        <div style="font-weight: 500; font-size: large;">
                            <button type="button" class="btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#myModal2" style="border-radius: 0px; padding-top: 0.1%; padding-bottom: 0.1%;">
                                Help
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <form onsubmit="submitForm(); return false;" action="AVRISSAPDB-advanced-search-result" method="get">
                            <div class="container-fluid" style="width: 90%; border: 2px solid #D3B683; background-color: #F5EDE0; margin-top: 2%;">
                                <div class="row">
                                    <div class="col-sm" style="padding: 2%;">
                                        <div style=" font-weight: 500;" class="mb-1"><u style="text-underline-offset: 20%;  text-decoration: underline #192734;">Non-range Attributes</u></div>
                                        <input id="query1" name="query1" type="hidden"></input>
                                        <div id='buildQ1'>
                                            <div id="optn">
                                            </div>
                                        </div>
                                        <input type='button' class="mt-2 bg-light" value='Add Field' id='addButton1' style='margin-left: 1%; padding-top: 0.1%; padding-bottom: 0.1%; text-decoration: none; color: #3C005A; border: 1px solid #3C005A; --bs-btn-padding-y: 0.230rem; padding-left: 0.7%; padding-right: 0.7%;'>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="width: 90%; border: 2px solid #D3B683; background-color: #F5EDE0; margin-top: 0.8%;">
                                <div class="row">
                                    <div class="col-sm" style="padding: 2%;">
                                        <div style=" font-weight: 500;" class="mb-1"><u style="text-underline-offset: 20%;  text-decoration: underline #192734;">ID Attributes</u></div>
                                        <input id="query3" name="query3" type="hidden"></input>
                                        <div id='buildQ3'>
                                            <div id="optn">
                                            </div>
                                        </div>
                                        <input type='button' class="mt-2 bg-light" value='Add Field' id='addButton3' style='margin-left: 1%; padding-top: 0.1%; padding-bottom: 0.1%; text-decoration: none; color: #3C005A; border: 1px solid #3C005A; --bs-btn-padding-y: 0.230rem; padding-left: 0.7%; padding-right: 0.7%;'>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="width: 90%; border: 2px solid #D3B683; background-color: #F5EDE0; margin-top: 0.8%;">
                                <div class="row">
                                    <div class="col-sm" style="padding: 2%;">
                                        <div style="font-weight: 500;" class="mb-1"><u style="text-underline-offset: 20%;  text-decoration: underline #192734;">Range Attributes</u></div>
                                        <input id="query2" name="query2" type="hidden"></input>
                                        <div id='buildQ2'>
                                            <div id="optn">
                                            </div>
                                        </div>
                                        <input type='button' class="mt-2 bg-light" value='Add Field' id='addButton2' style='margin-left: 1%; padding-top: 0.1%; padding-bottom: 0.1%; text-decoration: none; color: #3C005A; border: 1px solid #3C005A; --bs-btn-padding-y: 0.230rem; padding-left: 0.7%; padding-right: 0.7%;'>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="width: 90%; margin-top: 0.8%;">
                                <div class="row">
                                    <div class="col-sm" style="padding: 0.5%;">
                                        <input type='submit' class="btn-sm btn-primary" value='Search' id='searchButton1' style="margin-left: 2.5%; border-radius: 0px; padding-top: 0.1%; padding-bottom: 0.1%;">
                                        <input class="btn-sm btn-danger" type="reset" style="border-radius: 0px; padding-top: 0.1%; padding-bottom: 0.1%;">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function() {
                                var track1 = 2;

                                function addSearchField1() {
                                    var myDiv1 = $(document.createElement('div')).attr("id", 'myT1' + track1);
                                    myDiv1.after().html(
                                        '<div class="p-2 container-fluid"><div class="row"><div class="col-sm text-center">' +
                                        '<select id="record' + track1 + '">' +
                                        '<option value="">Select an Attribute</option>' +
                                        '<option value="`Entry_type`">Entry type</option>' +
                                        '<option value="`Peptide_name`">Peptide name</option>' +
                                        '<option value="`Source`">Source</option>' +
                                        '<option value="`Source_organism`">Source organism</option>' +
                                        '<option value="`Taxonomy`">Taxonomy</option>' +
                                        '<option value="`Validation`">Validation</option>' +
                                        '<option value="`Sequence`">Sequence</option>' +
                                        '<option value="`Target_organism`">Target organism</option>' +
                                        '</select> &nbsp;' +
                                        '<input type="text" name="textbox' + track1 + '" id="textbox' + track1 + '" value="" style="width:50%; padding-left: 0.8%; padding-right:0.8%;"> &nbsp; ' +
                                        '<select id="condExp' + track1 + '">' +
                                        '<option value="" selected="selected">Operator</option>' +
                                        '<option value="AND">AND</option>' +
                                        '<option value="OR">OR</option>' +
                                        '<option value="AND NOT">NOT</option>' +
                                        '</select> &nbsp;' +
                                        '<input type="button" value="Remove" class="removeButton1 bg-white" style="padding-top: 0.1%; padding-bottom: 0.1%; text-decoration: none; color: red; border: 1px solid red; --bs-btn-padding-y: 0.230rem; padding-left: 0.7%; padding-right: 0.7%;">' +
                                        '</div></div></div>'

                                    );
                                    myDiv1.appendTo("#buildQ1");
                                    track1++;

                                    $(".removeButton1").click(function() {
                                        $(this).parent().remove();
                                    });
                                }

                                $("#addButton1").click(addSearchField1);

                                $("#removeButton1").click(function() {
                                    if (track1 === 1) {
                                        alert("No more textbox to remove");
                                        return false;
                                    }
                                    track1--;
                                    $("#myT1" + track1).remove();
                                });
                                var track2 = 2;

                                function addSearchField2() {
                                    var myDiv2 = $(document.createElement('div')).attr("id", 'myT2' + track2);
                                    myDiv2.after().html(
                                        '<div class="p-2 container-fluid"><div class="row"><div class="col-sm text-center">' +
                                        '<select id="record2' + track2 + '">' +
                                        '<option value="">Select an Attribute</option>' +
                                        '<option value="`Length`">Length</option>' +
                                        '</select> &nbsp;' +
                                        '<select id="condExp2' + track2 + '">' +
                                        '<option value="" selected="selected">Condition</option>' +
                                        '<option value="="> = </option>' +
                                        '<option value=">"> > </option>' +
                                        '<option value="<"> < </option>' +
                                        '<option value=">="> >= </option>' +
                                        '<option value="<="> <= </option>' +
                                        '<option value="<>">Not Eq</option>' +
                                        '<option value="BETWEEN">Between</option>' +
                                        '</select> &nbsp;' +
                                        '<input type="text" style="width: 17%;" name="textbox2' + track2 + '" id="textbox2' + track2 + '" value=""> &nbsp;' +
                                        '<select id="condExp2_1' + track2 + '">' +
                                        '<option value="" selected="selected">Operator</option>' +
                                        '<option value="TO">TO</option>' +
                                        '</select> &nbsp;' +
                                        '<input type="text" style="width: 17%;" name="textbox2_1' + track2 + '" id="textbox2_1' + track2 + '" value=""> &nbsp;' +
                                        '<select id="condExp2_2' + track2 + '">' +
                                        '<option value="" selected="selected">Operator</option>' +
                                        '<option value="AND">AND</option>' +
                                        '<option value="OR">OR</option>' +
                                        '<option value="AND NOT">NOT</option>' +
                                        '</select> &nbsp;' +
                                        '<input type="button" value="Remove" class="removeButton2 bg-white" style="color: red; border: 1px solid red;">' +
                                        '</div></div></div>'

                                    );
                                    myDiv2.appendTo("#buildQ2");
                                    track2++;

                                    $(".removeButton2").click(function() {
                                        $(this).parent().remove();
                                    });
                                }

                                $("#addButton2").click(addSearchField2);

                                $("#removeButton2").click(function() {
                                    if (track2 === 2) {
                                        alert("No more textbox to remove");
                                        return false;
                                    }
                                    track2--;
                                    $("#myT2" + track2).remove();
                                });
                                var track3 = 2;

                                function addSearchField3() {
                                    var myDiv3 = $(document.createElement('div')).attr("id", 'myT3' + track3);
                                    myDiv3.after().html(
                                        '<div class="p-2 container-fluid"><div class="row"><div class="col-sm text-center">' +
                                        '<select id="record3' + track3 + '">' +
                                        '<option value="">Select an Attribute</option>' +
                                        '<option value="`AVR_I_SSAP_ID`">AVR/I/SSAPDB ID</option>' +
                                        '<option value="`PubMed_ID`">PubMed ID</option>' +
                                        '<option value="`PDB_ID`">PDB ID</option>' +
                                        '<option value="`UniProt_ID`">UniProt ID</option>' +
                                        '<option value="`DrugBank_ID`">DrugBank ID</option>' +
                                        '</select> &nbsp;' +
                                        ' <input type="text" name="textbox' + track3 + '" id="textbox3' + track3 + '" value="" style="width:58%; padding-left: 0.8%; padding-right:0.8%;"> &nbsp; ' +
                                        '<select id="condExp3' + track3 + '">' +
                                        '<option value="" selected="selected">Operator</option>' +
                                        '<option value="AND">AND</option>' +
                                        '<option value="OR">OR</option>' +
                                        '<option value="AND NOT">NOT</option>' +
                                        '</select> &nbsp;' +
                                        '<input type="button" value="Remove" class="removeButton3 bg-white" style="color: red; border: 1px solid red;">' +
                                        '</div></div></div>'
                                    );
                                    myDiv3.appendTo("#buildQ3");
                                    track3++;

                                    $(".removeButton3").click(function() {
                                        $(this).parent().remove();
                                    });
                                }
                                $("#addButton3").click(addSearchField3);

                                $("#removeButton3").click(function() {
                                    if (track3 === 1) {
                                        alert("No more textbox to remove");
                                        return false;
                                    }
                                    track3--;
                                    $("#myT3" + track3).remove();
                                });
                                $("#searchButton1").click(function() {
                                    var query1 = '';
                                    for (var ivar1 = 2; ivar1 < track1; ivar1++) {
                                        var attribute = $('#record' + ivar1).val();
                                        var value = $('#textbox' + ivar1).val();
                                        var operator = $('#condExp' + ivar1).val();
                                        query1 += attribute + " LIKE" + " '%" + value + "%' " + operator + " ";
                                    }
                                    var query2 = '';
                                    for (var ivar2 = 2; ivar2 < track2; ivar2++) {
                                        var attribute2 = $('#record2' + ivar2).val();
                                        var condition = $('#condExp2' + ivar2).val();
                                        var value2 = $('#textbox2' + ivar2).val();
                                        var operator2 = $('#condExp2_1' + ivar2).val();
                                        var value3 = $('#textbox2_1' + ivar2).val();
                                        var operator3 = $('#condExp2_2' + ivar2).val();
                                        query2 += attribute2 + " " + condition + " " + value2 + " " + operator2 + " " + value3 + " " + operator3 + " ";
                                    }
                                    var query3 = '';
                                    for (var ivar3 = 2; ivar3 < track3; ivar3++) {
                                        var attribute = $('#record3' + ivar3).val();
                                        var value = $('#textbox3' + ivar3).val();
                                        var operator = $('#condExp3' + ivar3).val();
                                        query3 += attribute + " LIKE" + " '%" + value + "%' " + operator + " ";
                                    }
                                    var element1 = document.getElementById("query1");
                                    var element2 = document.getElementById("query2");
                                    var element3 = document.getElementById("query3");
                                    element1.value = query1;
                                    element2.value = query2;
                                    element3.value = query3;
                                    element1.form.submit();
                                    element2.form.submit();
                                    element3.form.submit();
                                    urlParams.toString().form.submit();
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>


            <div class="modal" id="myModal2" style="border-radius: 0px;">
                <div class="modal-dialog modal-xl" style="border-radius: 0px;">
                    <div class="modal-content" style="border-radius: 0px;">
                        <div class="modal-header" style="background-color: #3C005A; border-radius: 0px;">
                            <p class="text-white" style="font-size: larger; font-weight: 500;">AVR/I/SSAPDB
                                Help</p>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body" style="background-color: #F0F8FF;">
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
                        <div class="modal-footer" style="background-color: #F0F8FF;">
                            <button type="button" class="btn-sm btn-danger" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <br><br><br>
        </div>
        <div class="container-fluid fixed-bottom" style="background-color: #3C005A;">
            <div class="row">
                <div class="col-sm text-center text-white p-1" style="font-size: small;">
                    © 2024, B&BL, DoAS, IIIT-A, India
                </div>
            </div>
        </div>
    </div>
</body>

</html>