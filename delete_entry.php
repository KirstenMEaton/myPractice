<!DOCTYPE html>
    <html>
        <head>
            <title>Delete a Blog Entry</title>
        </head>
        <body>
            <h2>Delete an Blog Entry</h2>
            <?php
          
            
            // Connect and select:
            $dbc = mysql_connect('localhost', 'kirsten', 'happybunny1');
            mysql_select_db('myblog', $dbc);
            
            if (isset($_GET['id']) && is_numeric($_GET['id']) ) {// Display the entry in a form
                // Define the query
                $query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
                
                if ($r = mysql_query($query, $dbc))
                // Run the query   
                {
                    $row = mysql_fetch_array($r); // Retrieve the information
                    
                    // Make the form
                    print '<form action="delete_entry.php" method="post">
                    <p>Are you sure you want to delete this entry?</p>
                    <p><h3>' . $row['title'] . '</h3>' . $row['entry'] . '<br />
                    <input type="hidden" name="id" value="' . $_GET['id'] .'" />
                    <input type="submit" name="submit" value="Delete this Entry!" /></p>
                    </form>';
                }else{
                    // Couldn't get the information.
                        print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . 
                        mysql_error($dbc) . '.</p><p>The query being run was: ' .  $query . '</p>';
                     }
            }elseif (isset($_POST['id']) && is_numeric($_POST['id']))
                // Define the query:
                { 
                   $query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
                   $r = mysql_query($query, $dbc); //Execute the query
                   // Report on the results:
                   if (mysql_affected_rows($dbc) == 1 )
                    {
                    print '<p>The blog entry has been deleted.</p>';
                    }else{
                    print '<p style="color: red;">Could not delete the blog entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
                   }
                }else { // No ID received
                    print '<p style="color: red;">This page has been accessed in error. </p>';
                      }// End of main IF.
             
             mysql_close($dbc); // Close the connection.
            ?>
        </body>
              
   </html>