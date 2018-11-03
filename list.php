<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<title>Danh sách user</title>
</head>
<body><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="login.css">
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
  
	<div class="col-md-8">
<?php  		
require 'connection.php';
                if ($conn->connect_error) {
                    die("Failed to connect: " . $conn->connect_error);
                }

                $sql = "Select * from download";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên file</th>
                        <th scope="col">File Type</th>
                        <th scope="col">File Size</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Lượt tải</th>
                        </tr>
                    </thead>';
                    while($row = $result->fetch_assoc()) {
                        echo 
                            '<form action="delete.php" method="post">
                            <tbody>
                                <tr>
                                 <td>'.$row['DownloadID'].'</td>
                                <th scope="row" name="user_name" value="'.$row['FileName'].'">'.$row['FileName'].'</th>
                                <th scope="row" name="user_name" value="'.$row['FileType'].'">'.$row['FileType'].'</th>
                                <th scope="row" name="user_name" value="'.$row['FileSize'].'">'.$row['FileSize'].'</th>
                                <th scope="row" name="user_name" value="'.$row['SimpleDescription'].'">'.$row['SimpleDescription'].'</th>
                                <th scope="row" name="user_name" value="'.$row['NumberDownload'].'">'.$row['NumberDownload'].'</th>
                                <td><button type=submit name="sua" value="'.$row['DownloadID'].'" class="btn btn-success">Sửa</button></td>
                               <td><button type=submit name="xoa" value="'.$row['DownloadID'].'" class="btn btn-danger">Xóa</button></td>
                                </tr>
                            </tbody>
                            </form>';
                            
                    }
                }
?>
      </div>
	</div>
</div>
</section>
	 

</body>
</html>4