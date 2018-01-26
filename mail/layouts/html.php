<?php
use yii\helpers\Html;
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <title><?= Html::encode($this->title) ?></title>

        <style>
            .info p {
                font-family: sans-serif;
            }

            .table-wrap {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
            }
                .table-wrap td {
                    border-bottom: 1px solid #ccc;
                }

            th {
                padding: 10px;
                text-align: left;
            }
            td {
                padding: 10px;
                border-bottom: #ccc;
            }
            tr:nth-child(2n) {
                background-color: #e4e4e4;
            }
        </style>

    </head>
    <body>

    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>