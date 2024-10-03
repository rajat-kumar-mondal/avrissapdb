<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVR/I/SSAPDB News/Updates</title>
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
                        <a class="nav-link active" href="AVRISSAPDB-news">News/Updates</a>
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
                <h4 style="font-weight: 500;">AVR/I/SSAPDB News/Updates</h4>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm">
                <?php
                require 'dbcon.php';
                $sql = "SELECT * FROM `news` ORDER BY dt DESC";
                $result = $con->query($sql);
                $c = 1;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="p-2 mb-2" style="background-color:#F5EDE0; border: 3px solid #D3B683;">
                        <div class="" style="text-align: justify; padding: 0% 2% 0% 2.5%; font-size: medium; font-weight: 500;">
                            <?= $c ?>. <?= $row['headline'] ?>
                        </div>
                        <div class="" style="text-align: justify; padding: 0% 2% 0% 4%; font-size: medium;">
                            <?= $row['news details'] ?>
                        </div>
                        <div class="" style="text-align: justify; padding: 0% 2% 0% 4%; font-size: small;">
                            <i>By Admin, Date & Time: <?= $row['dt'] ?>.</i>
                        </div>
                    </div>
                <?php $c += 1;
                } ?>
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