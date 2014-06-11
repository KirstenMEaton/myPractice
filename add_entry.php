<!DOCTYPE html>
    <html>
        <head>
            <title>Add a Blog Entry</title>
        </head>
        <body>
            <h1>Add a Blog Entry</h1>
            <?php
            /* This script adds an entry to the blog */
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Connect to and select the database
                $dbc = mysql_connect('localhost', 'kirsten', 'happybunny1');
                mysql_selectdb('myblog', $dbc);
                
                // Validate the form data
                $problem = FALSE;
                if (!empty($_POST['title']) && !empty($_POST['entry']))
                {
                    $title = $_POST['title'];
                    $title = trim(strip_tags($title));
                    $title = mysql_real_escape_string($title, $dbc);
                }else{
                    print '<p style="color: red;">Please submit both a title and an entry.</p>';
                    $problem = TRUE;
                }
                if (!$problem)
                    {
                        // Define the query:
                        $query = "INSERT INTO entries (entry_id, title, entry, date_entered) VALUES (0, '$title', '$entry', NOW())";
                        
                        // Execute the query:
                        if (@mysql_query($query, $dbc))
                        {
                            print '<p>The blog entry has been added!</p>';
                        }else{
                            print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
                             }
                    } // No problem!
                    mysql_close($dbc); //Close the connection
            } //End of submission
            //Display the form
            ?>
            <form action="add_entry.php" method="post">
                <p>Entry Title:<input type="text" name="title" size="40" maxsize="100" /></p>
                <p>Entry Text: <textarea name="entry" cols="40" rows="5"></textarea></p>
                <input type="submit" name="submit" value="Post This Entry!" /> 
            </form>
        </body>
    </html>