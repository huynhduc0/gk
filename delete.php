<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xóa</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
	
</body>
</html>
<?php
require 'connection.php'; 
if (isset($_POST['xoa'])) {

		$id=$_POST['xoa'];
		$sql="delete from download where Downloadid=".$id;
		 if (mysqli_query($conn, $sql)) {
    echo "Xóa thành công";
    header("Location:list.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	}
else if(isset($_POST['sua'])){
	$id=$_POST['sua'];
		$sql="select * from Download where DownloadID=".$id;
		  $result = $conn->query($sql);
                    // echo $sql;
// var_dump($result);
if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
     echo '<div class="container pt-5">
     <form action="" method="POST">
     <input type="text" class="d-none" name="id" value="'.$row['DownloadID'].'"> 
       <fieldset class="form-group">
         <label for="Tourname">FileName</label>
         <input type="text" class="form-control" name="FileName" value='.$row['FileName'].'>
       </fieldset>
       <fieldset class="form-group">
         <label for="Tourname">FileType</label>
         <input type="text" class="form-control" name="FileType"value='.$row['FileType'].'>
       </fieldset>
       <fieldset class="form-group">
         <label for="Tourname">FileSize</label>
         <input type="text" class="form-control" name="FileSize" value='.$row['FileSize'].'>
       </fieldset>
       <fieldset class="form-group">
         <label for="">Simple Description</label>
         <input type="text" class="form-control" name="SimpleDescription" value='.$row['SimpleDescription'].'>
       </fieldset>
       <fieldset class="form-group">
         <label for="Tourname">Number Download</label>
         <input type="number" class="form-control" name="NumberDownload" value='.$row['NumberDownload'].'>
       </fieldset>
       <input type="submit" name="save" class="btn btn-success form-control" value="Save">
     </form>';

    }
}
else{
	echo 'null';
}
}
else if(isset($_POST['save'])){
          $id=$_POST['id'];
	 				$FileName = $_POST['FileName'];
          $FileSize = $_POST['FileSize'];
          $FileType = $_POST['FileType'];
          $SimpleDescription = $_POST['SimpleDescription'];
           $NumberDownload = $_POST['NumberDownload'];
         $update= "UPDATE `download` SET `FileName`=FileName,`FileType`=FileType,`FileSize`=$FileSize,`SimpleDescription`=$SimpleDescription,`NumberDownload`= $NumberDownload where DownloadID=$id";
          if ($conn->query($update) === TRUE) {
              echo '<div class="alert alert-success mt-1" role="alert">Succes</div>';
            } else {
              echo '<div class="alert alert-danger mt-1" role="alert">Failed</div>';
          }
                            // echo '",ten="'.$ten.'",lop="'.$lop.'",ngaysinh="'.$ns.'" where masv="'.$masv'"';
                             // $conn = new mysqli('localhost', 'root','','ttsv');
                             // mysqli_set_charset($conn, 'UTF8');   
                if (mysqli_query($conn, $update)) {
    echo "New record created successfully";
    header("Location: list.php");
} else {
    echo "Error: " . $update . "<br>" . mysqli_error($conn);
}
}

 	
  ?>