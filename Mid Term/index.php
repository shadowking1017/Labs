<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This MidTerm was amazing!!!This Midterm was amazing!!!This Midterm was amazing!!!This Midterm was amazing!!!This MidTerm was amazing!!!</p></div>';
} // End of the function definition.

$page_title = 'Welcome to the MidTerm';
include('includes/header.html');

// Call the function:
create_ad();
?>

<div class="page-header"><h1>Midterm Application w/ Incidents</h1></div>
<p>The midterm includes all we have learned so far. Please use accessible styles.</p>
<p>Your site will display data from the tech_support database. In addition to the home page, the
customer, incidents and technicians’ pages, supply additional pages to show the following
information or provide functionality:</p>
<p>1. Add two hyperlinks to the customer page (see example below). When hyperlinks are clicked:</p> <p>- Display incidents for this customer (HINT: most customers have NO incidents)
<br>- Display products this customer has registered for</p>
<p>2. On the technician’s page, provide an EDIT link so technician information can be updated
(NOT the ID)
</p>

<?php
// Call the function again:
create_ad();
include('includes/footer.html');
?>
<!-- end php code-->





