<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Customize Your Settings</title>
    <style type="text/css">    
    body
    {
        font-size: x-large;
        color: #999;
    }
    <?php // Script 9.2 - view_settings.php
    if (isset($_COOKIE['font_size']))
    {
        print "\t\tfont-size: " .  htmlentities($_COOKIE['font_size']) . ";\n";
    }else{
        print "\t\tfont-size: medium;";
    }
    if (isset($_COOKIE['font_color']))
    {
        print "t\tcolor: #" . htmlentities($_COOKIE [font_color]) . ";\n";
        }
        else
        {
        print "\t\tcolor: #000;";
    }
    ?>
    </style>
</head>
<body>
    <p><a href="customize.php">Customize Your Settings</a></p>
    <p><a href="reset.php">Reset Your Settings</a></p>
    <p>Yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda yadda</p>
</body>
</html>
