<?php
if (isset($_POST['number'])) {
    $searchMask = str_replace([' ', '(', ')', '-'], '', $_POST['number']);


    if (substr($searchMask, 0, 1) !== "+") {
        $searchMask = "+" . $searchMask;
    }
    $dataJson = file_get_contents('https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json');
    $dataArray = json_decode($dataJson, true);
    $outputArr = [];
    foreach ($dataArray as $contryData) {
        $countryMaskStr = str_replace(['#', '-', '(', ')'], '', $contryData['mask']);
        if (strpos($searchMask, $countryMaskStr) !== false) {
            $outputArr[strlen($countryMaskStr)] = $contryData['name_ru'];
        }
    }
    if (empty($outputArr)) {
        $output = 'Страна не найдена - проверьте правильность номера';
    } else {
        $output = end($outputArr);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" role="search" method="post" id="check-country">
                <input class="form-control me-2" type="search" placeholder="Введите номер" aria-label="Search"
                       name="number" value="<?= $_POST['number'] ?>">
                <button class="btn btn-outline-success" type="submit">определить страну</button>
            </form>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h1><?= $output ?></h1>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="assets/main.js"></script>
</body>
</html>