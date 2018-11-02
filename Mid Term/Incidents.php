<?php # Script 9.7 - password.php
// This page lets a user change their password.
$page_title = 'All Open Incidents';
include('includes/header.html');

// Page header:
echo '<h1>All Open Incidents</h1>';





require('mysqli_connect.php'); // Connect to the db.

// Make the query:
//$q = "SELECT CONCAT(firstname, ' ', lastname) AS name, state, email FROM customers ";
$q = "SELECT CONCAT(technicians.firstName, ' ',technicians.lastName) AS name, incidents.incidentID AS id, incidents.title AS title, incidents.productCode AS pc, incidents.dateOpened AS do  FROM incidents INNER JOIN technicians ON incidents.techID = technicians.techID";


$r = @mysqli_query($dbc, $q); // Run the query.

$num = mysqli_num_rows($r);

if ($r) { // If it ran OK, display the records.


	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
	<th align="left"><strong>Tech Name</strong></th>
	<th align="left"><strong>Incident ID</strong></th>
	<th align="left"><strong>Title</strong></th>
	<th align="left"><strong>Product Code</strong></th>
	<th align="left"><strong>Date Opened</strong></th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['id'] .  '</td><td align="left">' . $row['title']  . '</td><td align="left">' . $row['pc'] . '</td><td align="left">' .  $row['do'] .  '</td></tr> ' ;
	//echo '<tr><td align="left">' . $row['l'] . '</td><td align="left">' . '<a href="posts.php?id=' . $row['user_id'] . '">View User Posts</a>' . '</td><tr>';
	}

	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.

} else { // If it did not run OK.

	// Public message:
	echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';

	// Debugging message:
	echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

} // End of if ($r) IF.

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');
?>