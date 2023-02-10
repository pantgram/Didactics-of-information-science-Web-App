<?php
// docs variables

$title= "";
$description="";

function getDocuments() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM documents ";
	$result = mysqli_query($conn, $sql);

	$documents = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $documents;
}

if (isset($_POST['submitDoc'])) {
  $target_file = "files/".basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $file_path = "files/" . $_FILES["file"]["name"];
    // λάβετε όλες τις τιμές εισαγωγής από τη φόρμα
    $docDesc = mysqli_real_escape_string($conn, $_POST['description']);
    $docTitle = mysqli_real_escape_string($conn, $_POST['title']);
          // Insert values into database
    $insert = $conn->query("INSERT into document (title,description,filepath)
                                    VALUES ('$docTitle', '$docDesc','$file_path')");

          if($insert){
            echo "successful";
            header('location: documents.php'); //successful insertion
          }
  }

if (isset($_GET['edit_doc'])) {
	$doc_id = $_GET['edit_doc'];
	editDoc($doc_id);
}
// if user clicks the update post button
if (isset($_POST['update_Doc'])) {
	updateDoc($_POST,$doc_id);
}
// if user clicks the Delete post button
if (isset($_GET['delete_doc'])) {
	$doc_id = $_GET['delete_doc'];
	deleteDoc($doc_id);
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
	function editDoc($doc_id)
	{
		global $conn, $description, $title;
		$sql = "SELECT * FROM document WHERE id=$doc_id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$doc = mysqli_fetch_assoc($result);
		// set form values on the form to be updated
		$title = $doc['title'];
		$description = $doc['description'];
	}

	function updateDoc($request_values,$doc_id)
	{
    global $conn;
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $target_file = "files/".basename($_FILES["file"]["name"]);
      move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
      $file_path = "files/" . $_FILES["file"]["name"];
      // λάβετε όλες τις τιμές εισαγωγής από τη φόρμα
    $query = "UPDATE document SET title='$title',description='$description', filepath='$file_path' WHERE id='$doc_id'";
       mysqli_query($conn, $query);
      header('location: documents.php');
      exit(0);

}
	// delete blog post
	function deleteDoc($doc_id)
	{
		global $conn;
		$sql = "DELETE FROM document WHERE id=$doc_id";
		if (mysqli_query($conn, $sql)) {
			header("location: documents.php");
			exit(0);
		}
	}
?>
