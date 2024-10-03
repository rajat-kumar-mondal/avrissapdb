<html>

<head>
    <link rel="short icon" href="logo.png">
</head>
<title>
    VIEW: AVR_I_SSAPDB-custom-report
</title>

<body>
    <?php
    if (filesize("AVR_I_SSAPDB-custom-report.tsv") < 3630376) {
        $fp = fopen("AVR_I_SSAPDB-custom-report.tsv", "r") or die("Unable to open file!");
        $tsv_content = fread($fp, filesize("AVR_I_SSAPDB-custom-report.tsv"));
        $content = "<pre>$tsv_content</pre>";
        echo "$content";
        fclose($fp);
    } else {
        echo "UNABLE TO LOAD DATA IN BROWSER! <br>The report may contain large amount of text.<br>This message is shown to avoid the unresponsiveness of the browser. Please go back and download the report to view it.";
    }

    ?>
</body>

</html>