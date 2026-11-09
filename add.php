<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $item = trim($_POST["item"]);
    $borrower = trim($_POST["borrower"]);
    $due = $_POST["due_date"] === "" ? null: $_POST["due_date"];
    // use to save the input first before inserting into the dB instead of directly accessing it
    $stmt = $conn->prepare("INSERT INTO loans (item, borrower, due_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $item, $borrower, $due);
    $stmt->execute();
    $stmt->close();

    header("Location: show.php");
    exit;
}
?>

<form method="post">
    Item: <input name="item" maxlength="30" required><br>
    Borrower: <input name="borrower" maxlength="30" required><br>
    Due Date: <input type="date" name="due_date"><br>
    <button>Save</button>
</form>
<a href = "show.php">Back</a>
