<!DOCTYPE html>
    <html>
        <head>
            <title>
                
            </title>
        </head>
        <body>
        <?php
        /* This script lists the directories and files in a directory */
        
        // Set the time zone:
        date_default_timezone_set ('America/New_Mexico');
        // Set the directory name and scan it:
        $search_dir = '.';
        // Scans the directory and sets it to an array 
        $contents = scandir($search_dir);
        // List the directories first...
        // Print a caption and start a list:
        print '<h2>Directories</h2>
        <ul>';
        foreach ($contents as $item)
        {
            if ( (is_dir($search_dir . '/' . $item)) AND (substr($item, 0,1) != '.'))
            {
                print "<li>$item</li>\n";
            }
        }
        print '</ul>'; // Close the list
        
        // Create a table header:
        print '<hr /><h2>Files</h2>
        <table cellpadding="2" cellspacing="2" align="left">
        <tr><td>Name</td><td>Size</td><td>Last Modified</td></tr>';
        
        // List the files:
        foreach ($contents as $item)
        {
            if ( (is_file($search_dir . '/' .  $item)) AND (substr($item, 0,1) != '.'))
            {                                                                                                                    
               // Get the file size:
               $fs = filesize($search_dir . '/' . $item);
               
               // Get the file's modification date:
               $lm = date('F j, Y', filemtime($search_dir . '/' . $item));
               
               // Print the information:
               print"<tr><td>$item</td>
               <td>$fs bytes</td>
               <td>$lm</td></tr>\n";
               
            } // Close the If
        } // Close the foreach
        print '</table>'; // Close the HTML table
        ?>
        </body>
    </html>
    
    
    
    
    
    
    
    
    
    
    
    
    
    