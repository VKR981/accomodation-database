<?php

session_start();

if($_SESSION['utype']!=3){
	echo "unauthorised access";
    exit();
}
require 'scripts/dbh.php';

$sql="SELECT * FROM users";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: DB</title>
	<script src="extensions/editable/bootstrap-table-editable.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.js" type="text/javascript"></script>
    <link href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.css" rel="stylesheet" type="text/css" />

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="scripts/logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>



	<div class="d-flex align-items-center flex-column mt-4" width:500px>

<table id="table"
  data-toggle="table"
  data-sort-class="table-active"
  data-sortable="true"
  data-search="true"
  data-id-field="id"
  data-select-item-name="id"
  data-height="auto"
  data-url=""
  data-editable-emptytext="Default empty text."
   data-editable-url="/my/editable/update/path"
   id="table"
  data-toggle="table"
  data-sort-class="table-active"
  data-sortable="true"
  data-search="true"
  data-id-field="id"
  data-select-item-name="id"
  data-height="auto"
  data-url="">
	<thead>
		<tr>
			<th data-editable="true" data-field="name" data-sortable="true" > Full Name </th>
			<th data-editable="true" data-field="name" data-sortable="true" > EmailID </th>
			<th data-field="id" name='id' data-sortable="true"> Password </th>
			<th>CollegeID</th>
			<th>User Type</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['pwd']; ?></td>
			<td><?php echo $row['cid']; ?></td>
			<td><?php echo $row['utype']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td>
				<a href="scripts/edit.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="scripts/delete.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</div>
<!-- <form>


	<form method="post" action="server.php" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>
	</form> -->

</body>
</html>