<?php
/**
 * Created by PhpStorm.
 * User: xlfederalelk0lx
 * Date: 28/04/18
 * Time: 10:10
 */

require_once "vendor/autoload.php";

$bebo = new \App\Bootstrap();

if($_GET['movie'] != ''){
    $response = $bebo->GetStream($_GET['movie']);
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            body,html{
                padding: 0px;
                margin: 0px;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://content.jwplatform.com/libraries/mSxCKZW4.js"></script>
    </head>
    <body>
    <div id="FilebeboPlayer"></div>
    <script type="text/javascript">
        $(function () {
            jwplayer("FilebeboPlayer").setup({
                file: "<?= $response->file ?>",
                image:"<?= $response->poster ?>",
                height: 360,
                width: 640,
                autostart: false,
                preload: "metadata",
                primary: "html5"
            });

            jwplayer("FilebeboPlayer").on("ready",function () {
                jwplayer("FilebeboPlayer").resize($(document).width(),$(document).height());
            });
        });
    </script>
    </body>
    </html>
    <?php
}
