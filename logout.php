<?php
/* This is the logout page . It destroys the cookie */

// Destroy the cookie but only if it already exists:
if (isset($_COOKIE['Sade'])) {
    setcookie('Sade', FALSE, time()-300);
}

// Define a pate title and include the header:
define('TITLE', 'Logout');
include('template/header.html');

// Print a message;
print '<p>You are now logged out.</p>';

// Include the footer:
include('template/footer.html');
?>