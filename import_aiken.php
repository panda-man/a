<?php
/**
 * Created by PhpStorm.
 * User: panda-man
 * Date: 2018/05/30
 * Time: 10:13
 */
if (!isset($_POST['file_name'])) {
    header('Location: index.php');
    exit();
}

function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

$problem_number = 7;
//ファイル名
$file_name = h($_POST['file_name']);

for ($i = 1; $i <= $problem_number; $i++) {
    //問題文
    ${'question_' . $i}= h($_POST["q_$i"]);
    //選択肢4つ
    ${'choice_list_' . $i} = array();
    foreach ($_POST["choices_$i"] as $answer) {
        ${'choice_list_' . $i}[] = h($answer);
    }
    //正解
    ${'answer_' . $i} = h($_POST["answer_$i"]);
}
//text変換用フォーマット
for ($i = 1; $i <= $problem_number; $i++) {
    ${'text_' . $i} = ${'question_' . $i} . "\n" . "A. " . ${'choice_list_' . $i}[0] . "\n" . "B. " . ${'choice_list_' . $i}[1] . "\n" . "C. " . ${'choice_list_' . $i}[2] . "\n" . "D. " . ${'choice_list_' . $i}[3] . "\n" . "ANSWER:" . ${'answer_' . $i}. "\n";
    echo ${"text_$i"};
}

if (!$FP = fopen("./$file_name.txt", "w"))
    echo "error";
else {
    for ($i = 1; $i <= $problem_number; $i++) {
        fwrite($FP, ${"text_$i"});
    }
    fclose($FP);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>akiten maker | HCS</title>
    <meta name="description" content="入力フォームからAkitenフォーマットのtxtファイル作成">
    <meta name="author" content="HCS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">

    <h1>ファイルの作成が完了しました。</h1>

</div>
<!-- Jquery -->
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous">
</script>
<!-- bootstrap-validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</body>