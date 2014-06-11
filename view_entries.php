<!DOCTYPE html>
    <html>
        <head>
            <title>
                
            </title>
        </head>
        <body>
            <h1>My Blog</h1>
            <?php
            /* This script views database entries from my blog */
            $dbc = mysql_connect('localhost', 'kirsten', 'happybunny1');
            mysql_select_db('myblog', $dbc);
            $query = 'SELECT * FROM entries ORDER BY date_entered DESC';
            if ($r = mysql_query($query, $dbc))
            {
                while ($row = mysql_fetch_array ($r))
                {
                    print "<p><h3>{$row['title']}</h3>{$row['entry']}<br />
                    <a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a>
                    <a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a>
                    </p><hr />\n";
                }
            }else{
                    // Query didn't run.
                    print '<p style="color: red;">Could not retrieve the date because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
                 } // End of query IF
                 mysql_close($dbc); //Close the connection
            ?>
        </body>
    </html>