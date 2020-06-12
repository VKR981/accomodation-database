<?php

session_start();
if($_SESSION['utype']!=1){
    exit();
}
$usremail=$_SESSION['emailid'];
require 'scripts/dbh.php';

$sql="SELECT id, cid, status FROM users WHERE email='$usremail'";

$result = mysqli_query($conn, $sql);

$srow = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>jQuery Grid Inline Editing</title>
    <meta charset="utf-8" />
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
      <form action="scripts/apply.php" method="post"> <table
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
        <th data-radio="true">Apply</th>
      <th data-field="id" name='id' data-sortable="true">ID</th>
      <th data-field="name" data-sortable="true">College Name</th>
      <th data-field="price" data-sortable="true">Available seats</th>
      <!-- <th data-field="selling"
        data-formatter="inputFormatter"
        data-events="inputEvents">Apply</th> -->
       
      <th data-field="status" data-sortable="true">status</th>
    </tr>
  </thead>

  <tbody>

    <?php


    require 'scripts/dbh.php';

    $sql='SELECT * FROM cnames';

    $result = mysqli_query($conn, $sql);
    

    if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td></td>";

    echo "<td>";
    echo $row['id'];
    echo"</td>";

    echo "<td>";
    echo $row['Cname'];
    echo"</td>";
        
    echo "<td>";
    echo $row['seats'];
    echo"</td>";


    
    

    if($srow['cid']==$row['id'])
    {
        if($srow['status']){
            echo "<td>Approved</td>";
        }
        elseif($srow['status']==0){
            echo "<td>Applied/Waiting for approval</td>";
            
        }
    }
    else{
        echo "<td>-</td>";
    }
    
    
        
        
        
    echo "</tr>";
  }
} else {
  echo "0 results";
}


    ?>

    </tbody>


</table>
<button class="btn btn-primary">Apply</button>
</form>
 </div>


<!--  <script>
  var $table = $('#table')

  function inputFormatter(value) {
    var checked = value ? 'checked' : ''
    return '<input type="radio" ' + checked + ' />'
  }

  window.inputEvents = {
    'change :checkbox': function (e, value, row, index) {
      row.selling = $(e.target).prop('checked')
      $table.bootstrapTable('updateRow', {
        index: index,
        row: row
      })
    }
  }
</script> -->
<!-- <script>
  var $table = $('#table')

  $(function() {
    $('form').submit(function () {
      alert($(this).serialize())
      console.log($(this).serialize())
      return false
    })
  })
</script> -->

</body>
</html>
