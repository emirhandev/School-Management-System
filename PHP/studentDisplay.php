<html>
    <head>
    <title>Simple Database Access</title>

</head>
<body>
    <?php
    include "./dbConnect.php";
    $query = "SELECT ssn FROM student ";
    $result = mysqli_query($conn, $query);
    ?>
    <h4>Students Details for:</h4>
    <form method="post" action="studentDB.php">
        <select name="ssn">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $ssn = $row["ssn"];
                echo "<option>", $ssn, "\n";
            }
            ?>

        </select>
        <input type="submit" value="Get Student Details">
    </form>
<body>
<html>