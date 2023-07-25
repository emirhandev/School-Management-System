<html>
    <head>
    <title>Simple Database Access</title>

</head>
<body>
    <?php
    include "./dbConnect.php";
    $query = "SELECT pName FROM project";
    $result = mysqli_query($conn, $query);
    ?>
    <h4>Project Details for:</h4>
    <form method="post" action="projectDB.php">
        <select name="pName">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $pName = $row["pName"];
                echo "<option>", $pName, "\n";
            }
            ?>

        </select>
        <input type="submit" value="Get Project Details">
    </form>
<body>
<html>