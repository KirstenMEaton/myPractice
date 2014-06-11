<?php
/* This script list every quote */

// Include the header:
define('TITLE', 'View All Quotes');
include('template/header.html');
print '<h2>All Quotes</h2>';

if(!is_administrator()) {
    print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
    include('template/footer.html');
    exit();
}
include('../mysql_connect.pp');
$query = 'SELECT quote_id, quote, source, favorite FROM mequotes ORDER BY date_entered DESC';
if($r = mysql_query($query, $dbc)) {
    while ($row = mysql_fetch_array($r)) {
        print "<div><blockquote>{$row['quote']}</blockquote>-{$row['source']}\n";
        if ($row['favorite'] == 1) {
            print ' <strong>Favorite!</strong>';
        }
        print "<p><b>Quote Admin:</b><a href=\"edit_quote.php?id={$row['quote_id']}\">Edit</a> <->
        <a ref=\"delete_quote.php?id={$row['quote_id']}\">Delete</a></p></div>\n";
    }
    // End of while loop.
}else{
    // Query didn't run.
    print '<p class="error">Could not retrieve the data because:<br />' . mysql_error($dbc . '.</p><p>The query being run was: ' . $query . '</p>');
    
}
mysql_close($dbc);
include('template/footer.html');
?>