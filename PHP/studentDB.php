<html>
    <head>
    <title>Simple Database Access</title>
</head>
<body>
    <h4>Graduate or Undergraduate</h4>
    <?php
    include './dbConnect.php';
    $ssn = $_POST['ssn'];
    $query = "SELECT s.gradorUgrad, s.studentname 
          FROM student s
          WHERE s.ssn='$ssn'";

    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    ?>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $gradorUgrad = $row["gradorUgrad"];
        $studentname = $row["studentname"];

        if ($gradorUgrad == 0)
            echo $studentname . " - " . "Undergraduate ";
        else if ($gradorUgrad == 1)
            echo $studentname . " - " . "Graduate";
        ?>

        <?php
        $i++;
    }
    ?>
</table>
<h4>Taking Courses</h4>
<?php
include './dbConnect.php';

$ssn = $_POST['ssn'];

$query = "select e.courseCode from enrollment e where sssn='$ssn' ;";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>

    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $courseCode = $row["courseCode"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
        </tr>

        <?php
        $i++;
    }
    ?>
</table>

<h4>Grade Report</h4>
<?php
include './dbConnect.php';

$ssn = $_POST['ssn'];

$query = "select E.courseCode, E.yearr, E.semester, E.grade
from enrollment E
where E.sssn = '$ssn'";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Year</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Semester</font></th>  
        <th><font face="Arial, Helvetica, sans-serif">Grade</font></th>  
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $courseCode = $row["courseCode"];
        $yearr = $row["yearr"];
        $semester = $row["semester"];
        $grade = $row["grade"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $yearr; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $semester; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $grade; ?></font></td>
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

$query = "SELECT E.courseCode, E.sectionId, W.dayy,W.hourr
FROM weeklyschedule W NATURAL JOIN enrollment E -- thanks to natural join
where E.sssn = '$ssn' and  E.yearr=2023";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Section ID</font></th>   
        <th><font face="Arial, Helvetica, sans-serif">Day</font></th>  
        <th><font face="Arial, Helvetica, sans-serif">Hour</font></th>   
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $courseCode = $row["courseCode"];
        $sectionId = $row["sectionId"];
        $dayy = $row["dayy"];
        $hourr = $row["hourr"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $sectionId; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $dayy; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $hourr; ?></font></td>
        </tr>

        <?php
        $i++;
    }
    ?>
</table>
<h4>Advisor</h4>
<?php
include './dbConnect.php';

$ssn = $_POST['ssn'];

$query = "select s.studentid, s.studentname, i.iname
from Student s, instructor i
where i.ssn = s.advisorSsn and s.ssn='$ssn'";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Student ID</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Section Name</font></th>   
        <th><font face="Arial, Helvetica, sans-serif">Advisor Name</font></th>  
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $studentid = $row["studentid"];
        $studentname = $row["studentname"];
        $iname = $row["iname"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $studentid; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $studentname; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $iname; ?></font></td>
        </tr>

        <?php
        $i++;
    }
    ?>

</table>
<h4>All Courses</h4>
<?php
include './dbConnect.php';

$ssn = $_POST['ssn'];

$query = "select c.courseCode, c.courseName, c.ects
from course c
where c.courseCode in (select cu.courseCode
						from  curriculacourses CU, student S
                        where s.ssn = '$ssn' and s.currCode = CU.currCode and s.dname =CU.dname )";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Course Code</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Course Name</font></th>
        <th><font face="Arial, Helvetica, sans-serif">ECTS</font></th>  
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $courseCode = $row["courseCode"];
        $courseName = $row["courseName"];
        $ects = $row["ects"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseCode; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $courseName; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $ects; ?></font></td>
        </tr>

        <?php
        $i++;
    }
    ?>
</table>
<h4>Department</h4>
<?php
include './dbConnect.php';

$ssn = $_POST['ssn'];

$query = "select s.studentname,s.dName from student s where s.ssn='$ssn'";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>
<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Student Name</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Department Name</font></th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $studentname = $row["studentname"];
        $dName = $row["dName"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $studentname; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $dName; ?></font></td>
        </tr>

        <?php
        $i++;
    }
    ?>
</table>

<h4>Project</h4>
<?php
include './dbConnect.php';
$ssn = $_POST['ssn'];

$query = "SELECT g.leadSsn,g.pName
          FROM  project_has_gradstudent g
          WHERE g.Gradssn='$ssn'";

$result = mysqli_query($conn, $query);
mysqli_close($conn);
?>

<table border="2" cellspacing="2" cellpadding="2">
    <tr>
        <th><font face="Arial, Helvetica, sans-serif">Lead SSN</font></th>
        <th><font face="Arial, Helvetica, sans-serif">Project Name</font></th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $leadSsn = $row["leadSsn"];
        $pName = $row["pName"];
        ?>
        <tr>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $leadSsn; ?></font></td>
            <td><font face="Arial, Helvetica, sans-serif"><?php echo $pName; ?></font></td>
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
