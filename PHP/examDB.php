<html>
    <head>
    <title>Simple Database Access</title>
</head>
<body>
    <h4>Result List</h4>
    <?php
    include './dbConnect.php';
    $examname = $_GET['examname'];
    $courseCode = $_GET['courseCode'];
    $yearr = $_GET['yearr'];
    $semester = $_GET['semester'];
    $query = "select sssn, SUM(pointsEarned) as point
              from gradesperquestion 
              where courseCode='$courseCode' and examname='$examname' and yearr='$yearr' and semester='$semester'
              group by sssn";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>
    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Student Ssn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Point</font></th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sssn = $row["sssn"];
            $point = $row["point"];
            ?>

            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $sssn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $point; ?></font></td>
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
