<!doctype html>
<html lang="en">
<?php
require_once('connect.php'); // CONNECTION 
 session_start();
 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      <?php  
        $sql = "SELECT DISTINCT(Department) FROM [requestmonitoring].[dbo].[deptandsec] "; // sql for server
        $stmt = sqlsrv_query( $conn, $sql ); 
           while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                echo '"'.$row['Department'].'",';
             }
        ?>
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 
 
</body>
</html>