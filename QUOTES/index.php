<?php
include('template/header.html');
include('../mysql_connect.php');
// Define the query
if (isset($_GET['random']))
{
    $query = 'SELECT quote_id, quote, source, favorite FROM mequotes ORDER by RAND() DESC LIMIT 1';
}elseif (isset($_GET['favorite'])) {
    $query = 'SELECT quote_id, quote, source, favorite FROM mequotes WHERE favorite=1 ORDER BY RAND() DEC LIMIT 1';
}else{
    $query = 'SELECT quote_id, quote, source, favorite FROM mequotes ORDER BY date_entered DESC LIMIT 1';
}
// Run the query
if ($result = mysql_query($query, $dbc))
{
    // Retrieve the returned record:
    $row = mysql_fetch_array($result);
    // Print the record:
    print "<div><blockquote>{$row['quote']}</blockquote>-{$row['source']}";
    // Is this a favorite?
    if ($row['favorite'] == 1) {
    print ' <strong>Favorite!</strong>';
    }
    // Complete the div
    print ' </div>';

    // if the user is an administrator create links to edit

    if (is_administrator()) {
        print "<p><b>Quote Admin:</b> <a href=\"edit_quotes.php?id={$row['quote_id']}\">Edit</a> <->
        <a href=\"delete_quote.php?id={$row['quote_id']}\">Delete</a>
        </p>\n";
    }

}else{ // Query didn't run.
    print '<p class="error">Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
} // End of query IF>

mysql_close($dbc); // Close the connection.

print '<p><a href="index.php">Latest</a> <-> <a href="index.php?random=true">Random</a> <-> <a href="index.php?favorite=true">Favorite</a></p>';
include('template/footer.html'); // Gotta include the footer!
?>