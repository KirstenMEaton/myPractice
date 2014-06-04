<!DOCTYPE html>
    <html>
            <head>
            <title>Add A Quotation</title>
            </head>
        <body>
        <?php>
        /* This script displays and handles an HTML form. This script takes text input and stores it in a file */
        // Identify the file to use:
        $file = 'quotes.txt';
        
        // Check for a form submission
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        // Handle the form
        {
        
            if (!empty($_POST['quote']) && ($_POST['quote'] != 'Enter yor quotation here.') )
            // Need something to write
            {
                if (is_writable($file))
                {
                    // Confirm that the file is writable
                    
                    $fp = fopen($file, ab);
                    fwrite($fp, $_POST['quote']  . PHP_EOL);
                    fclose($fp);// Write the data.
                    // Print a message:
                    print '<p>Your quotation has been stored.</p>';
                }
                else
                {
                // Could not open the file
                print '<p style="color: red;">Your quotation could not be stored do to a system error!</p>';
                }
            }else{ // Failed to enter a quotation
                print'<p style="color: red;">Please enter a quotation!</p>';
            }
            
        }
        ?>
        <form action="add_quote.php" method="post">
            <textarea name="quote" rows="5" cols="30">Enter your quotation here.</textarea><br />
            <input type="submit" name="submit" value="Add This Quote!" />  
        </form>
        </body>
    </html>
    