<?php 

 
if(isset($_POST['submit'])){

  // Count total files
  $user=isset($_POST['user']) ? $_POST['user'] : NULL;
  $countfiles = count($_FILES['files']['name']);
 
  // Prepared statement
  $query = "INSERT INTO images (user,name,image) VALUES(?,?,?)";

  $statement = $db->prepare($query);

  // Loop all files
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Get extension
    $ext = end((explode(".", $filename)));

    // Valid image extension
    $valid_ext = array("png","jpeg","jpg");

    if(in_array($ext, $valid_ext)){

      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'upload/'.$filename)){

        // Execute query
        $statement->execute(array($user,$filename,'upload/'.$filename));

      }

    }
 
  }
  echo "File upload successfully";
}
?>