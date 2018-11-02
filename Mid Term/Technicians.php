<?php # Script 9.4 - Technicians.php
// This script retrieves all the records from the users table.

$page_title = 'Our Technicians';
include('includes/header.html');

// Page header:
echo '<h1>Our Technicians</h1>';





require('mysqli_connect.php'); // Connect to the db.

// Make the query:
//$q = "SELECT CONCAT(firstname, ' ', lastname) AS name, state, email FROM customers ";
$q = "SELECT lastName AS l, firstName AS f, email, phone FROM technicians";

$r = @mysqli_query($dbc, $q); // Run the query.

$num = mysqli_num_rows($r);

if ($r) { // If it ran OK, display the records.

echo "<p>There are currently $num registered users.</p>\n";
	// Table header.
	echo '<table width="60%">
	<thead>
	<tr>
	<th align="left"><strong>Last Name</strong></th>
	<th align="left"><strong>First Name</strong></th>
	<th align="left"><strong>Email</strong></th>
	<th align="left"><strong>Phone</strong></th>
	<th align="left"><strong>Update</strong></th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo '<tr><td align="left">' . $row['l'] . '</td><td align="left">' . $row['f'] .  '</td><td align="left">' . $row['email']  . '</td><td align="left">' . $row['phone'] . '</td><td align="left">' . '<a href="edit tech.php?id=' . $row['name'] . '">Update information</a>'.  '</td></tr> ' ;
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