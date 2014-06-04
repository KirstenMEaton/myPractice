<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset="text/html; charset=utf-8 />
        <title>Date Menus</title>
    </head>Ê
    <body>
        <?php
        
        
        // This function makes three pull-down menues for the months, days, and years 
        function make_date_menus()
        {
            //array to store the months 
            $months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'Novermber', 'December'); 
            //Make the month pull down menu;
            print '<select name="month">';
            foreach ($months as $key => $value)
                {
                print "\n<option value=\"$key\">$value</option>";
                }
            print '</select>';
            
            
            //make the day pull down menu
            print '<select name="day">';
            for ($day = 1; $day <= 31; $day++)
                {
                print "\n<option value=\"$day\">$day</option>";
                }
            print '</select>';
            
            //make year pull down menu
            print '<select name="year">';
            $start_year = date('Y');
            for ($y = $start_year; $y <= ($start_year + 10); $y++)
                {
                print "\n<option value=\"$y\">$y</option>";
                }
            
            //make the year pull down menu:
            print '</select>';
        }
        // Make the form:
        print '<form action="" method="post">';
        make_date_menus();
        print '</form>';
        
        ?>
    </body>
</html>
    