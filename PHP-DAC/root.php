<?php
require_once('include/lib.php');
require_once('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>DAC</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/semantic.min.js"></script>
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
                                Hello, root.
                            </h3>
                            <a class="ui blue button" href="table.php">
                                View
                            </a>
                            <a class="ui blue button" href="index.php?action=logout">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

