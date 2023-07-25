<html>
    <head>
    <title>Simple Database Access</title>
</head>
<body>
    <h4>Project Details</h4>
    <?php
    include './dbConnect.php';
    $pName = $_POST['pName'];
    $query = "select * from project where pName='$pName';";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Lead SSN</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Subject</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Budget</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Start Date</font></th>
            <th><font face="Arial, Helvetica, sans-serif">End Date</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Controlling Department</font></th>
        </tr>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $leadSsn = $row["leadSsn"];
            $pName = $row["pName"];
            $subject = $row["subject"];
            $budget = $row["budget"];
            $startDate = $row["startDate"];
            $enddate = $row["enddate"];
            $controllingDName = $row["controllingDName"];
            ?>

            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $leadSsn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $pName; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $subject; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $budget; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $startDate; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $enddate; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $controllingDName; ?></font></td>
            </tr>

            <?php
            $i++;
        }
        ?>

    </table>
    <form method="post" action="index.php">
        <p>        
        <input type="submit" value="Main Page">
