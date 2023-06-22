<?php include($_SERVER['DOCUMENT_ROOT']."/inc/dbinfo.php"); ?>
<html>
<body>
<h1>Sample page</h1>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);
?>

<!-- Display table data. -->
<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>ID</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Image</td>
  </tr>

<?php

$result = mysqli_query($connection, "SELECT * FROM users");

while($query_data = mysqli_fetch_row($result)) {
?>
<tr>
<td><?php echo $query_data[0]?></td>
<td><?php echo $query_data[1]?></td>
<td><?php echo $query_data[2]?></td>
<td>
<?php echo "<img src='https://s3.us-east-1.amazonaws.com/YOUR_BUCKET_NAME_HERE/$query_data[3]' alt='not working'>"?></td>
</tr>
<?php
}
?>
</table>

<!-- Clean up. -->
<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>