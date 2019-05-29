<?php
require_once('test.php');

?>
<!DOCTYPE html>
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
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui padded blue segment">
                            <h3 class="ui header">
                                root
                            </h3>
                            <table class="ui celled unstackable table">
                                <thead>
                                <tr>
                                    <th>username</th>
                                    <th>a.php</th>
                                    <th>b.php</th>
                                    <th>c.php</th>
                                    <th>d.php</th>
                                    <th>e.php</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row as $num => $perm) { ?>
                                        <tr>
                                         <td data-label="File">
                                                 <?= $num+1 ?>
                                         </td>
                                        <td data-label="a.php">
                                            <?= $perm["a_php"] ? '<b class="green-text">Yes</b>' : '<b class="red-text">No</b>' ?>
                                        </td>
                                        <td data-label="b.php">
                                            <?= $perm["b_php"] ? '<b class="green-text">Yes</b>' : '<b class="red-text">No</b>' ?>
                                        </td>
                                        <td data-label="c.php">
                                            <?= $perm["c_php"] ? '<b class="green-text">Yes</b>' : '<b class="red-text">No</b>' ?>
                                        </td>
                                        <td data-label="d.php">
                                            <?= $perm["d_php"] ? '<b class="green-text">Yes</b>' : '<b class="red-text">No</b>' ?>
                                        </td>
                                        <td data-label="e.php">
                                            <?= $perm["e_php"] ? '<b class="green-text">Yes</b>' : '<b class="red-text">No</b>' ?>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                    <a class="ui green button" href="update.php">
                                        Edit
                                    </a>
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

