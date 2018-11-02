<?php # Script 10.5 - #5
// This script retrieves all the records from the users table.
// This new version allows the results to be sorted in different ways.

$page_title = 'View the Current Users';
include('includes/header.html');
echo '<h1>Our Customers</h1>';

require('mysqli_connect.php');


// Define the query:
$q = "SELECT CONCAT(firstname, ' ', lastname) AS name, state, email FROM customers ORDER by state, name ASC ";
$r = @mysqli_query($dbc, $q); // Run the query.

$num = mysqli_num_rows($r);
if ($r) { // If it ran OK, display the records.

echo "<p>There are currently $num registered users.</p>\n";

// Table header:
echo '<table width="60%">
<thead>
<tr>
	<th align="left"><strong>State</strong></th>
	<th align="left"><strong>Name</strong></th>
	<th align="left"><strong>Email</strong></th>
	<th align="left"><strong>Customer Incidents</strong></th>
	<th align="left"><strong>Customer Registration</strong></th>
	

</tr>
</thead>
<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			echo '<tr><td align="left">' . $row['state'] . '</td><td align="left">' . $row['name'] .  '</td><td align="left">' . $row['email']  .'</td><td align="left">' . '<a href="posts.php?id=' . $row['name'] . '">View Customer incidents</a>'. '</td><td align="left">' . '<a href="posts.php?id=' . $row['name'] . '">View Products by Customer</a>'. '</td></tr> ' ;
	//echo '<tr><td align="left">' . $row['state'] . '</td><td align="left">' . '<a href="posts.php?id=' . $row['name'] . '">View User Posts</a>' . '</td><tr>';
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