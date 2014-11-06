<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Snooker in Splunk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="resource/normalize.css">
    <link rel="stylesheet" type="text/css"  href="resource/smart-form/smart-form.css">
    <link rel="stylesheet" type="text/css"  href="resource/index.css">

    <script type="text/javascript" src="resource/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="resource/jquery-ui.js"></script>
    <script type="text/javascript" src="resource/index.js"></script>
    <script type="text/javascript" src="resource/timepicker.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#dtimepicker1').val($.datepicker.formatDate('yy-mm-dd', new Date()));
            $('#dtimepicker1').datetimepicker({
                dateFormat: "yy-mm-dd",
                prevText: '<i class="fa fa-chevron-left"></i>',
                nextText: '<i class="fa fa-chevron-right"></i>',
                beforeShow: function(input, inst) {
                    var newclass = 'smart-forms';
                    var smartpikr = inst.dpDiv.parent();
                    if (!smartpikr.hasClass('smart-forms')){
                        inst.dpDiv.wrap('<div class="'+newclass+'"></div>');
                    }
                }
            });
        });

    </script>

</head>

<body class="woodbg">

<div class="smart-wrap">
    <div class="smart-forms smart-container wrap-2">

        <div class="form-header header-primary" id="header">
            <h4><i class="fa fa-flask"></i>Snooker in Splunk</h4>
            <div id="addUserDiv">
                <img src="resource/addUser2.png">
            </div>
            <div id="addUserForm">
                <form>
                    <input type="text" name="newname" id="newname">
                    <button type="submit" id="addUserSubmit" class="button btn-primary">Add User</button>
                </form>
            </div>
        </div>
        <!-- end .form-header section -->


        <form method="post" name="result" action="record.php" id="form-ui" onSubmit="return validateForm();">
            <div class="form-body">

                <div class="spacer-t10 spacer-b30">
                    <div class="tagline"><span>PLAYER</span></div>
                    <!-- .tagline -->
                </div>

                <div class="frm-row">

                    <div class="section colm colm6">
                        <label class="field select">
                            <select id="playerA" name="playerA">
                                <?php
                                if(!isset($_SESSION["playerA"])){
                                    echo "<option selected value=\"Choose Player A\">Choose Player A</option>";
                                }
                                else{
                                    echo "<option value=\"Choose Player A\">Choose Player A</option>";
                                }
                                $playerFile = "player.txt";
                                $handle = fopen($playerFile, "r");
                                while (!feof($handle)) {
                                    $name = fgets($handle);
                                    if($name!="")
                                    {
                                        if(trim($name)==$_SESSION["playerA"]){
                                            echo "<option selected>$name</option>";

                                        }
                                        else{
                                            echo "<option>$name</option>";
                                        }
                                    }
                                }
                                fclose($handle);
                                ?>
                            </select>
                            <i class="arrow"></i>
                        </label>
                    </div>
                    <div class="section colm colm6">
                        <label class="field select">
                            <select id="playerB" name="playerB">
                                <?php
                                if(!isset($_SESSION["playerB"])){
                                    echo "<option selected value=\"Choose Player B\">Choose Player B</option>";
                                }
                                else{
                                    echo "<option value=\"Choose Player B\">Choose Player B</option>";
                                }
                                $playerFile = "player.txt";
                                $handle = fopen($playerFile, "r");
                                while (!feof($handle)) {
                                    $name = fgets($handle);
                                    if($name!="")
                                    {
                                        if(trim($name)==$_SESSION["playerB"]){
                                            echo "<option selected>$name</option>";

                                        }
                                        else{
                                            echo "<option>$name</option>";
                                        }
                                    }
                                }
                                fclose($handle);
                                ?>
                            </select>
                            <i class="arrow"></i>
                        </label>
                    </div>
                    <!-- end section -->
                </div>

                <div class="spacer-t10 spacer-b30">
                    <div class="tagline">
                        <span>SCORE</span>
                    </div>
                    <!-- .tagline -->
                </div>

                <div class="frm-row">

                    <div class="section colm colm6">
                        <label class="field select">
                            <select id="scoreA" name="scoreA">
                                <option value="0">0</option>
                                <option value="1" selected="selected">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <i class="arrow"></i>
                        </label>
                    </div>
                    <div class="section colm colm6">
                        <label class="field select">
                            <select id="scoreB" name="scoreB">
                                <option value="0" selected="selected">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <i class="arrow"></i>
                        </label>
                    </div>
                    <!-- end section -->
                </div>


                <div class="frm-row">
                    <div class="section colm colm12">
                        <div class="spacer-t10 spacer-b30">
                            <div class="tagline"><span>Timepicker</span></div><!-- .tagline -->
                        </div>
                        <label for="dtimepicker1" class="field prepend-icon">
                            <input type="text" id="dtimepicker1" name="dtimepicker1" class="gui-input">
                        </label>
                    </div><!-- end section -->

                </div><!-- end .frm-row section -->


                <div class="form-footer">
                    <button type="submit" class="button btn-primary"> ADD RESULT</button>
                </div>
                <!-- end .form-footer section -->
            </div>
        </form>
    </div>
</div>


</body>
</html>
