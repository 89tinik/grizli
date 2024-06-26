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
<div class="container">
    <h3>Korzyści ze współpracy z nami</h3>
</div>
<div class="container d-flex benefits-wrap d-none d-xl-flex d-lg-flex">
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
    <div class="benefit">
        <img src="assets/icon.png" alt="" title="">
        <p>Przechowywanie towarów ponadgabarytowych</p>
        <a href="#">Opis</a>
    </div>
</div>


<div id="carouselExampleSlidesOnly" class="carousel slide d-lg-none" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="benefit carousel-item active">
            <img src="assets/icon.png" alt="" title="">
            <p>Przechowywanie towarów ponadgabarytowych</p>
            <a href="#">Opis</a>
        </div>
        <div class="benefit carousel-item">
            <img src="assets/icon.png" alt="" title="">
            <p>Przechowywanie towarów ponadgabarytowych</p>
            <a href="#">Opis</a>
        </div>
        <div class="benefit carousel-item">
            <img src="assets/icon.png" alt="" title="">
            <p>Przechowywanie towarów ponadgabarytowych</p>
            <a href="#">Opis</a>
        </div>
        <div class="benefit carousel-item">
            <img src="assets/icon.png" alt="" title="">
            <p>Przechowywanie towarów ponadgabarytowych</p>
            <a href="#">Opis</a>
        </div>
        <div class="benefit carousel-item">
            <img src="assets/icon.png" alt="" title="">
            <p>Przechowywanie towarów ponadgabarytowych</p>
            <a href="#">Opis</a>
        </div>
    </div>
</div>


<footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
    <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row">

        </div>
    </div>
</footer>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
     tabindex="-1">
    <div class="modal-dialog right-side me-0">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal cookies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>тут что-то про печенье)</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="accept-cookies">Принять</button>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
        integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/main.js"></script>
</body>
</html>