<?php
// projs variables

$goals= "";
$deliverables="";
$date="";

function getProjects() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM project ";
	$result = mysqli_query($conn, $sql);

	$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $projects;
}

//actions όταν πατηθεί το κουμπ΄ί "Υποβολή"
if (isset($_POST['submitProj'])) {
	global $conn;
    $target_file = "files/".basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $file_path = "files/" . $_FILES["file"]["name"];
    // λάβετε όλες τις τιμές εισαγωγής από τη φόρμα
    $deliverables = mysqli_real_escape_string($conn, $_POST['deliverables']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $goals = mysqli_real_escape_string($conn, $_POST['goals']);
          // Insert values into database
    $insert = $conn->query("INSERT into project (date,deliverables,goals,filepath)
                                    VALUES ('$date', '$deliverables','$goals','$file_path')");

          if($insert){
            header('location: homework.php'); //successful insertion
          }
      }
if (isset($_GET['edit_proj'])) {
	$proj_id = $_GET['edit_proj'];
	editProj($proj_id);
}
// if user clicks the update post button
if (isset($_POST['update_Proj'])) {
	updateProj($_POST,$proj_id);
}
// if user clicks the Delete post button
if (isset($_GET['delete_proj'])) {
	$proj_id = $_GET['delete_proj'];
	deleteProj($proj_id);
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
	function editProj($proj_id)
	{
		global $conn, $deliverables, $date,$goals;
		$sql = "SELECT * FROM project WHERE id=$proj_id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$proj = mysqli_fetch_assoc($result);
		// set form values on the form to be updated
		$date= $proj['date'];
    $goals= $proj['goals'];
		$deliverables = $proj['deliverables'];
	}

	function updateProj($request_values,$proj_id)
	{
    global $conn;
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $goals = mysqli_real_escape_string($conn, $_POST['goals']);
    $deliverables = mysqli_real_escape_string($conn, $_POST['deliverables']);
    $target_file = "files/".basename($_FILES["file"]["name"]);
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
      $file_path = "files/" . $_FILES["file"]["name"];
      // λάβετε όλες τις τιμές εισαγωγής από τη φόρμα
    $query = "UPDATE project SET goals='$goals',deliverables='$deliverables',date='$date', filepath='$file_path' WHERE id='$proj_id'";
       mysqli_query($conn, $query);
      header('location: homework.php');
      exit(0);

}
	// delete blog post
	function deleteProj($proj_id)
	{
		global $conn;
		$sql = "DELETE FROM project WHERE id=$proj_id";
		if (mysqli_query($conn, $sql)) {
			header("location: homework.php");
			exit(0);
		}
	}
?>
