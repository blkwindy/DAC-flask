<?php

require_once('include/lib.php');
check(NULL, __FILE__);

?><!DOCTYPE html>
<html>
<head>
    <title>DAC</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <style>.red-text { color: red; } .green-text { color: green; }</style>
</head>
<body>
    <div class="ui top grid container">
        <div class="row"></div>
        <div class="row">
            <div class="sixteen wide column">
                <div class="ui very padded segment">
                    <div class="ui two column grid">
                        <div class="column">
                            <div class="ui header" onclick="location.href = '';">
                                <h1>DAC</h1>
                                <small>Flag please!</small>
                            </div>
                        </div>
                        <div class="column">
                            <div class="ui padded blue segment">
                                <h3 class="ui header">
                                    <?= @session()->user ?>'s profile
                                </h3>
                                <table class="ui celled unstackable table">
                                    <thead>
                                        <tr>
                                            <th>File</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (@session()->perm as $file => $perm) { ?>
                                            <tr>
                                                <td data-label="File">
                                                    <a href="<?= $file ?>">
                                                        <?= $file ?>
                                                    </a>
                                                </td>
                                                <td data-label="Access">
                                                    <?= $perm ? '<b class="green-text">Yes</b>' : '<b class="red-text">No</b>' ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
