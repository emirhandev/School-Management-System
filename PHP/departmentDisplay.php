<html>
    <head>
    <title>Simple Database Access</title>

</head>
<body>
    <?php
    include "./dbConnect.php";
    $query = "SELECT dName FROM department";
    $result = mysqli_query($conn, $query);
    ?>
    <h4>Department Details for:</h4>
    <form method="post" action="departmentDB.php">
        <select name="dName">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $dName = $row["dName"];
                echo "<option>", $dName, "\n";
            }
            ?>

        </select>
        <input type="submit" value="Get Department Details">
    </form>
<body>
<html>