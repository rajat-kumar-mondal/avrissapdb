<?php require 'dbcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVR/I/SSAPDB Data Statistics</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
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
                        <a class="nav-link active" href="AVRISSAPDB-statistics">Statistics</a>
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
    <div class="container">
        <div class="row">
            <div class="col-sm text-center" style="margin-top: 2%;">
                <h4 style="font-weight: 500;">AVR/I/SSAPDB Data Statistics</h4>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <img src="data.svg" class="border border-3">
            </div>
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