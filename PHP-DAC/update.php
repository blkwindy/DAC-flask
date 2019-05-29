<?php

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
                            <h1>Auth</h1>
                            <small>Flag please!</small>
                        </div>
                    </div>
                    <div class="column">
                        <?php  { ?>
                        <h3 class="ui header">
                            Edit
                        </h3>
                        <form class="ui form" method="post" action="change.php">
                            <div class="field">
                                <label>Username</label>
                                <input type="radio" name="username" value="1" /> 1
                                <input type="radio" name="username" value="2" /> 2
                                <input type="radio" name="username" value="3" /> 3
                                <input type="radio" name="username" value="4" /> 4
                                <input type="radio" name="username" value="5" /> 5
                            </div>
                            <div class="field">
                                <label>filename</label>
                                <input type="radio" name="filename" value="a_php" /> a.php
                                <input type="radio" name="filename" value="b_php" /> b.php
                                <input type="radio" name="filename" value="c_php" /> c.php
                                <input type="radio" name="filename" value="d_php" /> d.php
                                <input type="radio" name="filename" value="e_php" /> e.php
                            </div>
                            <div class="field">
                                <label>请选择权限</label>
                                <input type="radio" name="auth" value="1" /> YES
                                <input type="radio" name="auth" value="0" /> NO <br />
                            </div>
                            <button class="ui blue button" type="submit">Edit</button>
                        </form>
                        <?php }
