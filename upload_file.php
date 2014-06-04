<!DOCTYPE html>
    <html>
        <head>
            <title>Upload A File</title>
        </head>
        <body>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            if(move_uploaded_file($_FILES['the_file']['tmp_name'],"../uploads/{$_FILES['the_file']['name']}"))
            {
                print '<p>Your file has been uploaded.</p>';
            }
            else
            {
                print '<p style="color: red;">Your file could not be uploaded beause: ';
                switch ($_FILES['the_file']['error'])
                {
                    case 1:
                        print 'The file exceeds the upload_max_filesize setting in php.ini';
                        break;
                    case 2:
                        print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';
                        break;
                    case 3:
                        print 'The file was only partially uploaded';
                        break;
                    case 4:
                        print 'No file was uploaded';
                        break;
                    case 6:
                        print 'The temporary folder does not exist.';
                        break;
                    default:
                        print 'Something unforeseen happened.';
                        break;
                    print '.</p>';
                }
            }
            ?>
        <form action="upload_file.php" enctype="multipart/form-data" method="post">
            <p>Upload a file using this form:</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <p><input type="file" name="the_file" name="the_file" /></p>
            <p><input type="submit" name="submit" value="Upload This File"/></p>
        </form>
        </body>
    </html>