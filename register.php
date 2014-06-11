<!DOCTYPE html>
    <html>
        <head>
            <title>Register</title>
            <style type="text/css" media="screen"> .error {color: red;}</style>
        </head>
        <body>
            <h1>Register</h1>
            <?php
            /* This script registers a user by storing their information in a text file and crating a direcory for them */
            
            // Identify the directory and file to use:
            $dir = '/home/kireaton/users/';
            $file = '/home/kireaton/users/users.txt';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Handle the form.
                $problem = FALSE; // No problems so far.
                // Check for each value...
                if (empty($_POST['username']))
                {
                    $problem = TRUE;
                    print '<p class="error">Please enter a user name!</p>';
                }
                 if (empty($_POST['password1']))
                {
                    $problem = TRUE;
                    print '<p class="error">Please enter a password!</p>';
                }
                  if ($_POST['password1'] != $_POST['password2'])
                  {
                    $problem = TRUE;
                    print '<p class="error">Your password did not match your confirmed password!</p>';
                }
                    if (!$problem)
                    { // If there were not any problems 
                        if (is_writable($file))
                        
                        { // If its writable then write it!
                          // Create the data to vbe written:
                            $subdir = time() . rand(0, 4596);
                            $data = $_POST['username'] . "\t" . md5(trim($_POST['password1']))  . "\t" . $subdir . PHP_EOL;
                            var_dump();
                            // Write the data:
                            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
                            
                            // Create the directory
                            mkdir ($dir. $subdir);
                             
                            // Print a mssg:
                            print '<p>You are now registered!</p>';
                        }else{
                            print '<p class="error">You could not be registered due to a system error.</p>';
                        }
                    }else{
                             // Forgot to enter a field
                                print '<p class="error">Please try again.</p>';
                    }
                }else{
                  // Display the form

            ?>
            <form action="register.php" method="post">
                <p>Username: <input type="text" name="username" size="20" /></p>
                <p>Password: <input type="password" name="password1" size="20" /></p>
                <p>ConfirmPassword: <input type="password" name="password2" size="20" /></p>
                <input type="submit" name="submit" value="Register" />
            </form>
            <?php } ?>
        </body>
    </html>