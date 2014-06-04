<!DOCTYPE html>
    <html>
        <head>
            
        </head>
        <body>
            <?php
            // this function makes a sticky text input
            // this function requires two arguments
            function make_text_input($name, $label)
            {
                // begin a paragraph and a lable:
                print'<p><label>' . $label . ': ';
                
                // begin the input:
                print '<input type="text" name="'. $name . '" size="20" ';
                
                // Add the value
                if (isset($_POST[$name]))
                {
                    print ' value="' . htmlspecialchars($_POST[name]) . '"';
                }
            
            // Complete the input, the label and the paragraph:
            print ' /></label></p>';
            }
            // End of make_text_input() function.
            
            //Make the form:
            print '<form action="" method="post">';
            
            //Create some text inputs:
            make_text_input('first_name', 'First Name');
            make_text_input('last_name', 'Last Name');
            make_text_input('email', 'Email Address');
            
            print '<input type="submit" name="submit" value="Register!" /></form>';
            ?>
        </body>
    </html>