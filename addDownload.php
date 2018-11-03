<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS File -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="main.css">
    <title>Add Book</title>
</head>
<body>
   ?>
   <div class="container pt-5">
     <form action="" method="POST">
       <fieldset class="form-group">
         <label for="Tourname">FileName</label>
         <input type="text" class="form-control" name="FileName">
       </fieldset>
       <fieldset class="form-group">
         <label for="Tourname">FileType</label>
         <input type="text" class="form-control" name="FileType">
       </fieldset>
       <fieldset class="form-group">
         <label for="Tourname">FileSize</label>
         <input type="text" class="form-control" name="FileSize">
       </fieldset>
       <fieldset class="form-group">
         <label for="">Simple Description</label>
         <input type="text" class="form-control" name="SimpleDescription">
       </fieldset>
       <fieldset class="form-group">
         <label for="Tourname">Number Download</label>
         <input type="number" class="form-control" name="NumberDownload">
       </fieldset>
       <input type="submit" name="add" class="btn btn-success form-control" value="Add">
     </form>
     <?php 
        include('connection.php');

        if(isset($_POST['add'])){
          $FileName = $_POST['FileName'];
          $FileSize = $_POST['FileSize'];
          $FileType = $_POST['FileType'];
          $SimpleDescription = $_POST['SimpleDescription'];

          $insert = 'INSERT INTO download VALUES ("","'.$FileName.'","'.$FileType.'","'.$FileSize.'","'.$SimpleDescription.'",0)';
          if ($conn->query($insert) === TRUE) {
              echo '<div class="alert alert-success mt-1" role="alert">Succes</div>';
            } else {
              echo '<div class="alert alert-danger mt-1" role="alert">Failed</div>';
          }
        }
      ?>
   </div>
</body>
</html>