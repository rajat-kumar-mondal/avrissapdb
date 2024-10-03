<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="ss.css">
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
                        <a class="nav-link" href="AVRISSAPDB-tutorial">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <?php
    require 'dbcon.php';
    @$name = $_POST['name'];
    @$org = $_POST['org'];
    @$usrCountry = $_POST['cntry'];
    @$email = $_POST['email'];
    @$phone = $_POST['phone'];
    @$messege = str_replace("'", "", str_replace('"', '', $_POST['messege']));;
    @$sub = $_POST['sub'];
    if (strlen($name) != 0 and strlen($org) != 0 and strlen($email) != 0) {
        $sql = "";
        if (@$udresult->status == 'success') {
            $nry = '<a style="cursor: default; text-decoration: none;" class="btn-sm btn-danger rounded-0">NOT RESPONDED</a>';
            $sql .= "INSERT INTO usr_response (`name`, `organisation`, `usr_country`, `email`, `phone`, `messege`, `dt`, `sub`) VALUES ('$name', '$org', '$usrCountry', '$email', '$phone', '$messege', CURRENT_TIMESTAMP, '$sub')";
        } else {
            $nry = '<a style="cursor: default; text-decoration: none;" class="btn-sm btn-danger rounded-0">NOT RESPONDED</a>';
            $sql .= "INSERT INTO usr_response (`name`, `organisation`, `usr_country`, `email`, `phone`, `messege`, `dt`, `sub`) VALUES ('$name', '$org', '$usrCountry', '$email', '$phone', '$messege', CURRENT_TIMESTAMP, '$sub')";
        }
        if (mysqli_query($con, $sql)) {
            echo "
        <div class='container' style='margin-top: 16%'>
        <div class='row bg-light p-2 m-2'>
            <div class='col-sm text-center p-2' style='font-family: Poppins, Arial, Helvetica, sans-serif; font-weight: 700; font-size:xx-large'>
                Thank for you for your time & valuable feedback. <br> We may contact you very soon.
                <br><span class='text-success' style='font-size: large'>Team AVR/I/SSAPDB</span>
            </div>            
        </div>
    </div>        
        ";
        } else {
            echo mysqli_error($con);
        }
        mysqli_close($con);
    } else {
        echo "
        <div class='container' style='margin-top: 16%'>
        <div class='row bg-light p-2 m-2'>
            <div class='col-sm text-center p-2' style='font-family: Poppins, Arial, Helvetica, sans-serif; font-weight: 700; font-size:xx-large'>
                INTERNAL SERVER ERROR                
            </div>            
        </div>
    </div>        
        ";
    }
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