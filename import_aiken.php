<?php
/**
 * Created by PhpStorm.
 * User: pamda-man
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
    ${'question_' . $i} = array();
    ${'answer_' . $i} = array();
    ${'question_' . $i}[] = h($_POST["q_$i"]);
    ${'answer_' . $i}[] = h($_POST["answer_$i"]);
}

for ($i = 1; $i <= $problem_number; $i++) {
    ${'wrong_answer_' . $i} = array();
    foreach ($_POST["wrongAnswerList_$i"] as $wrongAnswer) {
        ${'wrong_answer_' . $i}[] = h($wrongAnswer);
    }
}
//text変換用フォーマット
for ($i = 1; $i <= $problem_number; $i++) {
    ${'text_' . $i} = ${'question_' . $i}[0] . "\n" . "A. " . ${'answer_' . $i}[0] . "\n" . "B. " . ${'wrong_answer_' . $i}[0] . "\n" . "C. " . ${'wrong_answer_' . $i}[1] . "\n" . "D. " . ${'wrong_answer_' . $i}[2] . "\n" . "ANSWER:A" . "\n";
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
    <title>aiken transfer | HCS</title>
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
</body>