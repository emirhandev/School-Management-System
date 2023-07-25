--  List the students of a department D in form [studentId, student name, e-mail(s), grad or undergrad]

SELECT studentId, sName, email, gradorUgrad 
FROM emails e, student s
WHERE dName = "Department A" AND e.sssn=s.sssn;

-- List the advisors of students of a department D in form [studentId, student name, advisor name]

SELECT studentId, sName,iname 
FROM student s,instructor i 
WHERE s.dName = "Department A" and s.advisorSsn=i.ssn;

--  List the instructors of a department D.

SELECT *
FROM instructor i
WHERE dname = "Department A";

-- List the courses of an instructor I in year Y, semester S in form [course Code, coursename, ects]

SELECT c.courseCode,c.courseName,c.ects 
FROM Course c, sectionn s, Instructor i 
WHERE c.courseCode = s.courseCode AND s.issn = i.ssn 
AND i.iName = "Instructor 1" 
AND s.yearr = 2023 AND s.semester = "Spring"; 

--  List the instructors who are not offering any course in year Y, semester S.

SELECT * 
FROM instructor 
WHERE ssn NOT IN (SELECT issn 
FROM sectionn 
WHERE semester = "Spring" AND yearr = 2023);

--  List the students taking course C in a given year Y and semester S, such as students taking COMP2222 in Spring 2022.

SELECT st.sssn,st.sName,st.studentId
FROM student st, course c, sectionn s, enrollment e
WHERE e.semester = "Spring" AND e.yearr = 2023
AND c.courseCode = "COMP2222" AND s.courseCode = e.courseCode
AND e.sssn = st.sssn AND e.semester = s.semester;

--  List the students taking a particular section S. Note that, particular section means that all the compound
-- key fields of section is fixed, course C, instructor I, year Y, semester SE, section id ID 

SELECT st.sssn,st.sName,st.studentId
FROM student st, sectionn s, course c, instructor i, enrollment e
WHERE c.courseCode = "COMP2222" AND i.iName = "Instructor 1"
AND s.yearr = 2023 AND s.sectionId = 1
AND e.sssn = st.sssn AND e.courseCode = c.courseCode
AND e.yearr = s.yearr AND i.ssn = e.issn;

-- Given a student S, list all courses in his/her curriculum in form [course code, course name, ects]

SELECT c.courseCode,c.courseName,c.ects
FROM student st, course c, curriculaCourses cc, Curricula cr
WHERE st.gradorUgrad = cr.gradorUgrad AND cr.currCode = st.currCode
AND st.currCode = 1526 AND st.sssn = 159357824
AND cr.dName = st.dName AND cr.currCode = cc.currCode
AND cc.courseCode = c.courseCode;

-- Given a student S, semester SE, year Y, display timetable in the form [coursecode, section id, day, hour 
-- like COMP2222 1 Th 1

SELECT s.courseCode,s.sectionId,t.dayy,t.hourr
FROM student st, sectionn s, timeSlot t, enrollment e
WHERE st.sssn = 159357824 AND s.yearr = 2023
AND s.issn = st.advisorSsn AND s.semester = "Spring"
AND e.semester = s.semester AND s.yearr = e.yearr
AND s.sectionId = e.sectionId AND e.dayy = t.dayy
AND e.hourr = t.hourr AND e.courseCode = s.courseCode
AND st.sssn = e.sssn;

--  Given a student S, display his/her grade report in form [CourseCode, year, semester, grade] including
-- the courses s/he has no grades yet, like

SELECT e.courseCode, e.yearr, e.semester, e.grade
FROM enrollment e, student st 
WHERE st.sssn = 440846759 AND st.sssn = e.sssn
GROUP BY e.courseCode, e.yearr, e.semester, e.grade;

-- Display all grades of a course C in year Y semester S

SELECT e.grade
FROM enrollment e 
WHERE e.courseCode = "COMP2222" AND e.yearr = 2023
AND e.semester = "Spring";

--  Display all scores of a student S of a course C in the form [examname, score] like

SELECT s.examName, SUM(s.pointsEarned) as score
FROM StudentGradsPerQuestion s, QuestionsOfExam q
WHERE s.sssn = 440846759 AND s.courseCode = "COMP2222"
AND s.examName = q.examName AND s.semester = q.semester
AND s.courseCode = q.courseCode AND s.yearr = q.yearr
AND s.sectionId = q.sectionId AND s.issn = q.issn
AND s.qNo = q.qNo;

-- Display all points of a certain exam E course C offered in a particular year Y, and semester S in the
-- form [sssn, qNo, pointesEarned]. 

SELECT s.sssn, s.qNo, s.pointsEarned
FROM StudentGradsPerQuestion s, QuestionsOfExam q
WHERE s.courseCode = "COMP2222" AND q.examName = "Midterm 1"
AND s.qNo = q.qNo AND s.yearr = 2023 AND s.semester = "Spring"
GROUP BY s.sssn,s.qNo;

  --  List the projects controlled by a department D.
  
SELECT p.prName 
FROM Project p, Department d
WHERE p.contrDName = d.dName AND d.dName = "Department A";

--  List all people working in a project P.

SELECT i.iName as PeopleWorkingInAProject
FROM Project p, InstrInProjects ip, Instructor i
WHERE p.prName = "Project 3" AND p.prName = ip.prName
AND i.ssn = ip.PrjleadSsn
UNION
SELECT i.iName
FROM Project p, InstrInProjects ip, Instructor i
WHERE p.prName = "Project 3" AND ip.prName = p.prName
AND i.ssn = ip.issn
UNION 
SELECT st.sName
FROM GradsInProject gp, Project p, Student st
WHERE p.prName = "Project 3" AND p.prName = gp.prName
AND st.sssn = gp.gradsssn;

--  Assume for each hour of working in a project, instructors will be paid 100$ extra. Display extra
-- payments of instructors working in a project P in form [instructor ssn, instructor name, extra payment]

SELECT i.ssn, i.iName, ip.workingHours*100 AS extraPayment
FROM Instructor i, InstrInProjects ip, Project p
WHERE i.ssn = ip.issn AND p.prName = "Project 1"
AND ip.prName = p.prName
UNION
SELECT i.ssn, i.iName, ip.workingHours*100
FROM Instructor i, InstrInProjects ip, Project p
WHERE i.ssn = ip.PrjleadSsn AND p.prName = "Project 1"
AND ip.prName = p.prName;

--  Calculate average base salary of instructors of each department.

SELECT d.dName, (
    SELECT AVG(i.baseSalary) 
    FROM Instructor i 
    WHERE i.dName = d.dName) AS averageBaseSalary
FROM Department d;

