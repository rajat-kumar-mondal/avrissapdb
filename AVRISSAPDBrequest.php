<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVR/I/SSAPDB - Create Custom Report</title>
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
    <div class="container" style="color:#192734;">
        <div class="row">
            <div class="col-sm text-center" style="margin-top: 2%;">
                <h4 style="font-weight: 500;">Create Custom Report</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3" style="color:#192734; width: 97%">
        <div class="row">
            <div class="col-sm text-success">
                <b style="font-size: smaller; font-weight: 500;"> Note: All of the option will checked automatically if none of the option checked and click on "Run Report"</b>
            </div>
        </div>
    </div>
    <form onsubmit="submitForm(); return false;">
        <?php
        $myIds = $_POST["ids"];
        echo '<p id="myIds" style="display: none">' . $myIds . '</p>';
        ?>
        <div class="container-fluid " style="color: #192734; width:97%">
            <div class="row p-2 ">
                <div class="col-sm-3 border border-3" style="padding-top: 1%; padding-bottom: 1%;">
                    <div style="font-weight: 500;">General Description of Peptide(s)</div>
                    <div class="form-check mt-3" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="AVR_I_SSAP_ID" name="datareq" value="AVR_I_SSAP_ID"><label class="form-check-label" for="AVR_I_SSAP_ID">AVR/I/SSAPDB ID</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Entry_type" name="datareq" value="Entry_type"><label class="form-check-label" for="Entry_type">Entry type</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Peptide_name" name="datareq" value="Peptide_name"><label class="form-check-label" for="Peptide_name">Peptide name</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Length" name="datareq" value="Length"><label class="form-check-label" for="Length">Length</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Source" name="datareq" value="Source"><label class="form-check-label" for="Source">Source</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Source_organism" name="datareq" value="Source_organism"><label class="form-check-label" for="Source_organism">Source organism</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Taxonomy" name="datareq" value="Taxonomy"><label class="form-check-label" for="Taxonomy">Taxonomy</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Validation" name="datareq" value="Validation"><label class="form-check-label" for="Validation">Validation</label></div>
                </div>
                <div class="col-sm-3 border border-3" style="padding-top: 1%; padding-bottom: 1%;">
                    <div style="font-weight: 500;">Sequence Information</div>
                    <div class="form-check mt-3" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Sequence" name="datareq" value="Sequence"><label class="form-check-label" for="Sequence">Sequence</label></div>
                </div>
                <div class="col-sm-3 border border-3" style="padding-top: 1%; padding-bottom: 1%;">
                    <div style="font-weight: 500;">Activity Information</div>
                    <div class="form-check mt-3" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Target_organism" name="datareq" value="Target_organism"><label class="form-check-label" for="Target_organism">Target organism</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Inhibition_concentration" name="datareq" value="Inhibition_concentration"><label class="form-check-label" for="Inhibition_concentration">Inhibition concentration</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="Toxicity_&_hemolytic_activity" name="datareq" value="Toxicity_&_hemolytic_activity"><label class="form-check-label" for="Toxicity_&_hemolytic_activity">Toxicity & hemolytic activity</label></div>
                </div>
                <div class="col-sm-3 border border-3" style="padding-top: 1%; padding-bottom: 1%;">
                    <div style="font-weight: 500;">Database Cross-reference(s)</div>
                    <div class="form-check mt-3" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="PubMed_ID" name="datareq" value="PubMed_ID"><label class="form-check-label" for="PubMed_ID">PubMed ID</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="PDB_ID" name="datareq" value="PDB_ID"><label class="form-check-label" for="PDB_ID">PDB ID</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="UniProt_ID" name="datareq" value="UniProt_ID"><label class="form-check-label" for="UniProt_ID">UniProt ID</label></div>
                    <div class="form-check" style="padding-left: 16%;"><input type="checkbox" class="form-check-input" id="DrugBank_ID" name="datareq" value="DrugBank_ID"><label class="form-check-label" for="DrugBank_ID">DrugBank ID</label></div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-1" style="color: #192734; width:97%">
            <div class="row p-2">
                <div class="col-sm-3 border border-3" style="padding-top: 1%; padding-bottom: 1%;">
                    <b style="font-weight: 500;">Available Report Type: </b>
                    <div class="form-check mt-3" style="padding-left: 16%;"><input type="radio" class="form-check-input" id="tsv" name="fmt" value="tsv" checked><label class="form-check-label" for="tsv">TSV (Tab Separated Values)</label></div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-1" style="width:97%">
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="btn btn-success" style="border-radius: 0px;">Run Report</button>
                    <button type="reset" class="btn btn-danger" style="border-radius: 0px;">Reset</button>
                    <button type="button" style="border-radius: 0px;" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
                        Help
                    </button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-xl" style="border-radius: 0px;">
                            <div class="modal-content" style="border-radius: 0px; background-color:#3C005A;">
                                <div class="modal-header">
                                    <p style="font-size: x-large;" class="modal-title text-white">AVR/I/SSAPDB Custom Report Help</p>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body" style="background-color: #F0F8FF;">
                                    <div style="text-align: justify;">
                                        In this section all data attributes are enlisted. By
                                        select single or multiple checkbox(s) as per interest, a fully customized report can be downloaded.
                                    </div>
                                </div>
                                <div class="modal-footer" style="background-color: #F0F8FF; border-radius: 0px;">
                                    <button type="button" class="btn btn-danger" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="AmarForm" action="custom-report" method='POST' style='display: none'>
        <input id='ids' name='ids' type='text' value="">Input Here</input>
        <input id='myDataset' name='myDataset' type='text' value="">Input Here</input>
        <input id='myFormat' name='myFormat' type='text' value="">Input Here</input>
    </form>
    <script>
        function submitForm() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="datareq"]:checked');
            const values = [];
            checkboxes.forEach((checkbox) => {
                values.push(checkbox.value);
            });
            const checkboxes2 = document.querySelectorAll('input[type="radio"][name="fmt"]:checked');
            const values2 = [];
            checkboxes2.forEach((checkbox2) => {
                values2.push(checkbox2.value);
            });
            const urlParams = new URLSearchParams(window.location.search);
            const urlParams2 = new URLSearchParams(window.location.search);
            urlParams.set('datareq', values.join(','));
            urlParams2.set('fmt', values2.join(','));
            const the_Ids = document.getElementById('myIds').innerHTML;
            const myDataset = urlParams.toString()
            const myFormat = urlParams2.toString();
            document.getElementById("ids").value = the_Ids;
            document.getElementById("myDataset").value = myDataset;
            document.getElementById("myFormat").value = myFormat;
            document.getElementById("AmarForm").submit();
        }
    </script>
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