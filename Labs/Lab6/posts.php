<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.

$page_title = 'View User Posts';
include('includes/header.html');

// Page header:
echo '<h1>View Forum Posts</h1>';
require('mysqli_connect.php'); // Connect to the db.

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include('includes/footer.html');
	exit();
}

echo "<pre>";
print_r($_GET);
echo "</pre>";


// Make the query:
$q = "SELECT users.username AS name, messages.body AS body, messages.subject AS sub  FROM messages INNER JOIN users ON messages.user_id = users.user_id WHERE messages.user_id = $id";
$r = @mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);
if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table width="120%">
	<thead>
	<tr>
		<th align="left">Name</th>
		<th align="left">Subject</th>
		<th align="left">Post</th>
	</tr>
	</thead>
	<tbody>
';
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] .'</td><td align="left">' . $row['sub'] . '</td><td align="left">' . $row['body'] . '</td></tr>'; 
	}
	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.
} else { // If no records were returned.
	echo '<p class="error">There are currently no registered users.</p>';

	
}

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');

?>