<?php

session_start();

if($_SESSION['utype']!=2){
    exit();
}
$usremail=$_SESSION['emailid'];
require 'scripts/dbh.php';

$sql="SELECT id, cid, status, email, fname FROM users WHERE utype=1";

$result = mysqli_query($conn, $sql);

//$srow = mysqli_fetch_assoc($result);
//print_r($srow);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Panel</title>
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
      <form action="scripts/approve.php" method="post"> <table
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
        <th data-radio="true">radio</th>
        <th data-field="fname" name='id' data-sortable="true">Full Name</th>
      <th data-field="id" name='id' data-sortable="true">Email</th>
      <th data-field="name" data-sortable="true">college</th>
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

    $csql='SELECT * FROM cnames';

    $cresult = mysqli_query($conn, $csql);
    $cnamearray=[];
    $cseatarray=[];

    if(mysqli_num_rows($cresult) > 0){

      while($crow = mysqli_fetch_assoc($cresult)) {

        $cnamearray[$crow['id']]=$crow['Cname'];
        $cseatarray[$crow['id']]=$crow['seats'];

      }
    }
    

    if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($srow = mysqli_fetch_assoc($result)) {

    if($srow['cid']!=0){
    echo "<tr>";

    echo "<td></td>";

    echo "<td>";
    echo $srow['fname'];
    echo"</td>";

    echo "<td>";
    echo $srow['email'];
    echo"</td>";




    echo "<td>";
    echo $cnamearray[$srow['cid']];
    echo"</td>";
        
    echo "<td>";
    echo $cseatarray[$srow['cid']];
    echo"</td>";


    
    

    
      
    
    if($srow['status']){
            echo "<td>Approved</td>";
        }
        elseif($srow['status']==0){
            echo "<td>Applied/Waiting for approval</td>";
            
        }
        
        
        
    echo "</tr>";
  }
}
} else {
  echo "0 results";
}


    ?>

    </tbody>


</table>
<button class="btn btn-primary">Approve</button>
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
