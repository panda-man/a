<?php
/**
 * Created by PhpStorm.
 * User: panda-man
 * Date: 2018/05/30
 * Time: 10:13
 */
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
    <div id="header">
        <h1><a href="./index.php">aiken maker</a></h1>
    </div>
    <div id="main">
        <form role="form" data-toggle="validator" method="post" action="./import_aiken.php">
            <div class="form-group">
                <label for="InputKeyword">ファイル名(拡張子 .txt は除く）</label>
                <input type="text" class="form-control" name="file_name" id="InputKeyword" placeholder="ファイル名を入力してください"
                       data-required-error="この欄は必須入力です！" required>
            </div>
            <?php for ($i = 1; $i <= 7; $i++) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading linkPanelHeader">
                        <div class="form-group">
                            <label class="text-primary" for="InputFileName">確認テスト問題<?= $i ?> 問題文</label>
                            <input type="text" name="q_<?= $i ?>" class="form-control" placeholder="問題文を入力して下さい。"
                                   data-required-error="この欄は必須入力です！" required>
                        </div>
                        <div class="form-group">
                            <label class="text-success" for="InputAnswer" class="">確認テスト問題<?= $i ?> 正答</label>
                            <input type="text" name="answer_<?= $i ?>" id="answer" class="form-control"
                                   placeholder="正答を入力して下さい。" data-required-error="この欄は必須入力です！" required>
                        </div>
                        <div class="form-group">
                            <label class="text-danger" for="InputFileName">確認テスト問題<?= $i ?> 誤答1</label>
                            <input type="text" name="wrongAnswerList_<?= $i ?>[]" id="wa1" class="form-control"
                                   placeholder="誤答1を入力して下さい。" data-required-error="この欄は必須入力です！" required>
                        </div>
                        <div class="form-group">
                            <label class="text-danger" for="InputFileName">確認テスト問題<?= $i ?> 誤答2</label>
                            <input type="text" name="wrongAnswerList_<?= $i ?>[]" id="wa2" class="form-control"
                                   placeholder="誤答2を入力して下さい。" data-required-error="この欄は必須入力です！" required>
                        </div>
                        <div class="form-group">
                            <label class="text-danger" for="InputFileName">確認テスト問題<?= $i ?> 誤答3</label>
                            <input type="text" name="wrongAnswerList_<?= $i ?>[]" id="wa3" class="form-control"
                                   placeholder="誤答3を入力して下さい。" data-required-error="この欄は必須入力です！" required>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">ファイルを作成する</button>
            </div>
        </form>
    </div>
    <div id="footer">
        <p class="text-center">&copy;<?= date('Y') ?> HCS</p>
    </div>
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
</html>
