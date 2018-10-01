<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is Assignment!This is Assignment!This is Assignment!This is Assignment!This is Assignment!</p></div>';
} // End of the function definition.

$page_title = 'Welcome to this Site!';
include('includes/header.html');

// Call the function:
create_ad();
?>

<div class="page-header"><h1>Content Header</h1></div>
<p>Create a website with common look and feel, using include files for header and footer information.
Supply a style sheet.</p> 

<p>You can use the files from Lab 9, but change the styles.
Your site will display data from the forum database. In addition to the home page, the register and
change password pages, supply two additional pages to show the following information:</p>

<p>1. User name (handle), first and last name of users. Example: bugs Danny Kaye</p>
<p>2. Pick one user and display this user’s posts.</p>

<p>Show a screen shot of user page and single user’s post page running in Cloud9.</p>
<p>Show screen shot of your repo in Bitbucket</p>



<?php
// Call the function again:
create_ad();

include('includes/footer.html');
?>