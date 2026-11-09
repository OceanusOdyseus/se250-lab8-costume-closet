<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
$sql = "SELECT id, item, borrower, due_date, returned FROM loans";
$result = mysqli_query($conn, $sql);
?>
<?php if($result->num_rows === 0){ ?>
    <p> No loans yet. The closet is empty!</p>
<?php }else{ ?>
<table border="1">
<tr><th>Id</th><th>item</th><th>borrower</th><th>due date</th><th>returned</th></tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["item"]; ?></td>
<td><?php echo $row["borrower"]; ?></td>
<td><?php echo $row["due_date"]; ?></td>
<td><?php echo $row["returned"]; ?></td>
<td><a href="return.php?id=<?php echo $row["id"];?>">Return</a></td>
<td><a href="delete.php?id=<?php echo $row["id"];?>" onclick="return confirm('delete this loan?');">Delete</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<?php mysqli_close($conn); ?>