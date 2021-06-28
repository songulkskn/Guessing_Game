
<!doctype html>
<html lang="en">
<head>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>

<div class="content">
  <div class="content-inner">

<?php
$questions = [
    0 => ["Aklında tuttuğun şey canlı mı?", "soru=1", "soru=3"],//route
    1 => ["Bu şey düşünebilir mi?", "result=İnsan", "soru=2"],
    2 => ["Bu şey miyavlar mı?", "result=Kedi", "soru=0"],
    3 => ["Bu şey bir yazılım mı?", "result=Comer", "soru=0"],
];

$question_number = 0;
if ($_GET) {
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // get full url
    $url_components = parse_url($url); //parse url
    parse_str($url_components['query'], $params); // put array

    $question_number = $params['soru'];
    if (isset($params['result'])) {
        $parameter= $params['result'];
        header('Location: result.php?result='.$parameter);
        exit();
    }
}

?>

<?php
if ($question_number == 0)
{ ?>
    <div>

        <h1>Şunlardan birini aklında tut</h1>
        <ul class="list">
            <li>İNSAN</li>
            <li>KEDİ</li>
            <li>COMER</li>
        </ul>
    </div>
<?php }
?>

<div class="content-inner">
    <h4>
        <?php
        echo $questions[$question_number][0];
        ?>
    </h4>
    <a href="index.php?<?= $questions[$question_number][1] ?>" class="badge badge-success">EVET</a>
    <a href="index.php?<?= $questions[$question_number][2] ?>" class="badge badge-danger">HAYIR</a>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>




