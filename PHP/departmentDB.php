<html>
    <head>
    <title>Simple Database Access</title>
</head>
<body>
    <h4>Department Details</h4>
    <?php
    include './dbConnect.php';
    $dName = $_POST['dName'];
    $query = "select * from department where dName='$dName';";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Department Name</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Budget</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Head SSN</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Building Name</font></th>  
        </tr>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dName = $row["dName"];
            $budget = $row["budget"];
            $headSsn = $row["headSsn"];
            $buildingName = $row["buildingName"];
            ?>

            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $dName; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $budget; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $headSsn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $buildingName; ?></font></td>
            </tr>

            <?php
            $i++;
        }
        ?>


    </table>

    <form method="post" action="index.php">
        <p>        
        <input type="submit" value="Main Page">
            </body>
            </html>
