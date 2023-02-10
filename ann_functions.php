<?php
// announcements variables

$date= "";
$subject="";
$text="";
$errors = array();

function getAnnouncements() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM announcements ";
	$result = mysqli_query($conn, $sql);

	$announcements = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $announcements;
}
//actions όταν πατηθεί το κουμπ΄ί "Υποβολή"
if (isset($_POST['submitAnn'])) {
    // λάβετε όλες τις τιμές εισαγωγής από τη φόρμα
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $text = mysqli_real_escape_string($conn, $_POST['text']);
          // Insert values into database
          $insert = $conn->query("INSERT into announcement (date ,subject ,Text)
                                    VALUES ('$date', '$subject','$text')");

          if($insert){
            header('location: announcement.php'); //successful insertion
          }else{
            array_push($errors, "Υπήρξε σφάλμα. Προσπαθήστε αργότερα."); //insertion failed
          }
      }
if (isset($_GET['edit_ann'])) {
	$announcement_id = $_GET['edit_ann'];
	editAnn($announcement_id);
}
// if user clicks the update post button
if (isset($_POST['update_Ann'])) {
	updateAnn($_POST,$announcement_id);
}
// if user clicks the Delete post button
if (isset($_GET['delete_ann'])) {
	$announcement_id = $_GET['delete_ann'];
	deleteAnn($announcement_id);
}

// if user clicks the Edit post button


/* - - - - - - - - - -
-  Post functions
- - - - - - - - - - -*/

	/* * * * * * * * * * * * * * * * * * * * *
	* - Takes post id as parameter
	* - Fetches the post from database
	* - sets post fields on form for editing
	* * * * * * * * * * * * * * * * * * * * * */
	function editAnn($announcement_id)
	{
		global $conn, $date, $text, $subject;
		$sql = "SELECT * FROM announcement WHERE id=$announcement_id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$announcement = mysqli_fetch_assoc($result);
		// set form values on the form to be updated
		$text = $announcement['Text'];
		$subject = $announcement['subject'];
		$date = $announcement['date'];
	}

	function updateAnn($request_values,$announcement_id)
	{
    global $conn;
    $text = mysqli_real_escape_string($conn, $_POST['text']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $query = "UPDATE announcement SET Text='$text',subject='$subject', date='$date' WHERE id='$announcement_id'";
       mysqli_query($conn, $query);
      header('location: announcement.php');
      exit(0);

}
	// delete blog post
	function deleteAnn($announcement_id)
	{
		global $conn;
		$sql = "DELETE FROM announcement WHERE id=$announcement_id";
		if (mysqli_query($conn, $sql)) {
			header("location: announcement.php");
			exit(0);
		}
	}
?>
