<!DOCTYPE html>
    <html>
        <head>
            <title>Connect to MySQL/Select the Database</title>
        </head>
        <body>
            <?php
            /* This script connects to the MySQL server */
            // Attempt to connect to MySQL and print out messages:
            if ($dbc = @mysql_connect('localhost', 'kirsten', 'happybunny1'))
            {
                print '<p>Successfully connected to MySQL!</p>';
                // Try to select the database:
                if (@mysql_select_db('mequotes', $dbc))
                {
                    print '<p>The database has been selected!</p>';
                    }else{
                    print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
                }
                mysql_close($dbc); // Close the connection
                }else{
                print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
            }
        ?>
        </body>
    </html>