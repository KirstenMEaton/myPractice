<!DOCTYPE html>
    <html>
        <head>
            <title>Create A Table</title>
        </head>
        <body>
            <?php
            /* This table connects to the MySQL server, selects the database, and creates a tabel. */
            
            // Connect and select
            if ($dbc = @mysql_connect('localhost', 'kirsten', 'happybunny1'))
            {
                
                // Handle the error if the database couldn't be selected:
                if (!@mysql_select_db('mequotes', $dbc))
                {
                    print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
                    mysql_close($dbc) . '.</p>';
                    mysql_close($dbc);
                    $dbc = FALSE;
                }
            }else{
              // Connection failed
              print'<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
            }
               if ($dbc)
               {
                    // Define the query:
                    $query = 'CREATE TABLE mequotes (quote_id INT UNSIGNED NOT NULL AUTO_INCREMENT, quote TEXT NOT NULL, source VARCHAR(100) NOT NULL, favorite TINYINT(1) UNSIGNED NOT NULL, date_entered TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (quote_id))';
                    // Execute the queery:
                    if (@mysql_query($query, $dbc))
                    {
                        print '<p>The my quotes table has been created!</p>';
                    }else{
                        print '<p style="color: red;">Could not create the table because:<br />' . mysql_error($dbc) . '.</p>
                        <p>The query being run was: ' . $query . '</p>';
                    }
               mysql_close($dbc); // Close the connection.
               }
             ?>
        </body>
    </html>