<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
    <title>Simple Database Access</title>
</head>
<body>
    <h4>Teaching Courses</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select s.issn, c.courseCode, c.courseName, c.ects 
                  from course c, sectionn s
                  where s.courseCode = c.courseCode and  s.issn='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Instructor Ssn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Course Name</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">ECTS</font></th>  
        </tr>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $issn = $row["issn"];
            $courseCode = $row["courseCode"];
            $courseName = $row["courseName"];
            $ects = $row["ects"];
            ?>

            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $issn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseName; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $ects; ?></font></td>
            </tr>

            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Weekly Schedule</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select * 
                  from weeklyschedule w
                  where w.issn='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Instructor Ssn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Section ID</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Year</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Semester</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Day</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Hour</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Building Name</font></th>  
            <th><font face="Arial, Helvetica, sans-serif">Room Number</font></th>  
        </tr>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $issn = $row["issn"];
            $courseCode = $row["courseCode"];
            $sectionId = $row["sectionId"];
            $yearr = $row["yearr"];
            $semester = $row["semester"];
            $dayy = $row["dayy"];
            $hourr = $row["hourr"];
            $buildingName = $row["buildingName"];
            $roomNumber = $row["roomNumber"];
            ?>

            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $issn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $sectionId; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $yearr; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $semester; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $dayy; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $hourr; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $buildingName; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $roomNumber; ?></font></td>
            </tr>

            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Students Of Each Course</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select e.sssn, e.issn, e.courseCode 
                  from enrollment e
                  where e.issn ='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Student Ssn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Instructor Ssn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>  
        </tr>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sssn = $row["sssn"];
            $issn = $row["issn"];
            $courseCode = $row["courseCode"];
            ?>

            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $sssn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $issn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>

            </tr>

            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Leading Projects</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select p.pName
                  from project p
                  where p.leadSsn ='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $pName = $row["pName"];
            ?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $pName; ?></font></td>
            </tr>
            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Working Projects</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select p.pName
                  from project_has_instructor p
                  where p.issn ='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $pName = $row["pName"];
            ?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $pName; ?></font></td>

            </tr>
            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Advising Students</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select ssn, studentid, studentname
                  from student st
                  where st.advisorSsn ='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Student Ssn</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Student ID</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Student Name</font></th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $ssn = $row["ssn"];
            $studentid = $row["studentid"];
            $studentname = $row["studentname"];
            ?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $ssn; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $studentid; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $studentname; ?></font></td>
            </tr>
            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Supervising Grad Students</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select g.ssn
                  from gradstudent g
                  where g.supervisorSsn ='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Grad Student Ssn</font></th>

        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $ssn = $row["ssn"];
            ?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $ssn; ?></font></td>

            </tr>
            <?php
            $i++;
        }
        ?>

    </table>

    <h4>Free Hours Report</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select T.dayy, T.hourr
              from timeslot T
              where (T.dayy, T.hourr) not in (SELECT W.dayy, W.hourr
                                              from enrollment E NATURAL JOIN weeklyschedule W
                                              where E.yearr=2023 and E.semester = 2 and 
                                              E.issn in (SELECT E2.issn
                                                         from enrollment E2
                                                         where E2.issn= '$ssn' and  
                                                         E2.yearr=2023 and  E2.semester = 2))";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>

    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Day</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Hour</font></th>

        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dayy = $row["dayy"];
            $hourr = $row["hourr"];
            ?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $dayy; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $hourr; ?></font></td>

            </tr>
            <?php
            $i++;
        }
        ?>

    </table>
    
    <h4>The Exams Delivered</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "select examname, date, courseCode, yearr, semester, sectionId
              from examofsection e
              where e.issn ='$ssn'";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn); //for this page we dont need the connection any more.        
    ?>
    <table border="2" cellspacing="2" cellpadding="2">
        <tr>
            <th><font face="Arial, Helvetica, sans-serif">Exam Name</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Date</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Year</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Semester</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Section ID</font></th>
            <th><font face="Arial, Helvetica, sans-serif">Grade Details</font></th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $examname = $row["examname"];
            $date = $row["date"];
            $courseCode = $row["courseCode"];
            $yearr = $row["yearr"];
            $semester = $row["semester"];
            $sectionId = $row["sectionId"];
            ?>
            <tr>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $examname; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $date; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $yearr; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $semester; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif"><?php echo $sectionId; ?></font></td>
                <td><font face="Arial, Helvetica, sans-serif">
                <a href="examDB.php?examname=<?php echo $examname ?>&courseCode=<?php echo $courseCode ?>&yearr=<?php echo $yearr ?>&semester=<?php echo $semester ?>">Go To Grade Details</a>
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


