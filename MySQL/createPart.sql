	SET FOREIGN_KEY_CHECKS = 0;

	create table Course(
	ects int,
	courseName varchar(30),
	courseCode varchar(10),
	numHours int,
	preReqCourseCode varchar(10),
	PRIMARY KEY(courseCode),
	FOREIGN KEY (preReqCourseCode) REFERENCES Course(courseCode)
	);

	create table sectionn(
	semester varchar(10),
	courseCode varchar(10),
	yearr int,
	sectionId int,
	quota int, 
	issn int,
	PRIMARY KEY(semester, courseCode, yearr, sectionId),
	FOREIGN KEY (courseCode) REFERENCES Course(courseCode)
	);

	create table Instructor(
	ssn int,
	iName varchar(30),
	rankk varchar(10),
	baseSalary int,
	extraSalary int,
	dName varchar(30),
	PRIMARY KEY(ssn)
	);

	alter table sectionn
	ADD FOREIGN KEY (issn) REFERENCES Instructor(ssn);

	create table BuildClass(
	buildingName varchar(30),
	roomNumber int,
	capacity int,
	PRIMARY KEY(buildingName, roomNumber)
	);

	create table Department(
	dName varchar(30),
	budget int,
	headSSn int,
	buildingName varchar(30),
	PRIMARY KEY(dName),
	FOREIGN KEY (headSSn) REFERENCES Instructor(ssn),
	FOREIGN KEY (buildingName) REFERENCES BuildClass(buildingName)
	);

	ALTER TABLE Instructor
	ADD FOREIGN KEY (dname) REFERENCES Department(dname);

	create table student(
	sssn int,
	gradorUgrad varchar(5),
	advisorSsn int,
	currCode varchar(15),
	dName varchar(30),
	studentId varchar(15) UNIQUE,
	sName varchar(30),
	PRIMARY KEY(sssn),
	FOREIGN KEY (advisorSsn) REFERENCES Instructor(ssn)
	);

	create table Curricula(
	currCode varchar(15),
	gradOrUGrad varchar(5),
	dName varchar(30),
	PRIMARY KEY(currCode, dName),
	FOREIGN KEY (dName) REFERENCES Department(dName)
	);

	alter table Student
	ADD FOREIGN KEY (currCode) REFERENCES Curricula(currCode),
	ADD FOREIGN KEY (dName) REFERENCES Curricula(dName);

	create table curriculaCourses(
	courseCode varchar(10),
	dName varchar(30),
	currCode varchar(15),
	PRIMARY KEY(courseCode, dName, currCode),
	FOREIGN KEY (courseCode) REFERENCES Course(courseCode),
	FOREIGN KEY (dName) REFERENCES Curricula(dName),
	FOREIGN KEY (currCode) REFERENCES Curricula(currCode)
	);

	create table TimeSlot(
	dayy varchar(10),
	hourr int,
	PRIMARY KEY(dayy,hourr)
	);



	create table enrollment(
	sssn int,
	courseCode varchar(10),
	grade varchar(5), 
	semester varchar(10),
	yearr int,
	sectionId int,
	issn int,
	buildingName varchar(30),
	roomNumber int,
	dayy varchar(10),
	hourr int,
	PRIMARY KEY(sssn,semester,courseCode,yearr,sectionId,issn),
	FOREIGN KEY (sssn) REFERENCES student(sssn),
	FOREIGN KEY (courseCode,semester,yearr,sectionId) REFERENCES sectionn(courseCode,semester,yearr,sectionId),
	FOREIGN KEY (issn) REFERENCES Instructor(ssn),
	FOREIGN KEY (buildingName,roomNumber) REFERENCES BuildClass(buildingName,roomNumber),
	FOREIGN KEY (dayy,hourr) REFERENCES TimeSlot(dayy,hourr)
	);

	create table emails(
	sssn int,
	email varchar(100),
	PRIMARY KEY(sssn, email),
	FOREIGN KEY (sssn) REFERENCES student(sssn)
	);

	create table gradstudent(
	sssn int,
	advisorSsn int,
	PRIMARY KEY(sssn),
	FOREIGN KEY (sssn) REFERENCES student(sssn),
	FOREIGN KEY (advisorSsn) REFERENCES Instructor(ssn)
	);

	create table prevDegrees(
	college varchar(50),
	degree varchar(20),
	yearr int,
	gradssn int,
	PRIMARY KEY(college,degree,yearr,gradssn),
	FOREIGN KEY (gradssn) REFERENCES gradStudent(sssn)
	);

	create table Project(
	leadSsn int,
	prName varchar(50),
	budget int,
	startDate date,
	endDate date,
	subjectt varchar(30),
	contrDName varchar(30),
	PRIMARY KEY(leadSsn,prName),
	FOREIGN KEY (leadSsn) REFERENCES Instructor(ssn),
	FOREIGN KEY (contrDName) REFERENCES Department(dName)
	);

	create table InstrInProjects(
	PrjleadSsn int, 
	prName varchar(50),
	issn int,
	workingHours int,
	PRIMARY KEY(PrjleadSsn,prName,issn),
	FOREIGN KEY (PrjleadSsn,prName) REFERENCES Project(leadSsn,prName),
	FOREIGN KEY (issn) REFERENCES Instructor(ssn)
	);

	create table GradsInProject(
	PrjleadSsn int,
	prName varchar(50),
	gradsssn int,
	workingHours int,
	PRIMARY KEY(PrjleadSsn,prName,gradsssn),
	FOREIGN KEY (PrjleadSsn,prName) REFERENCES Project(leadSsn,prName),
	FOREIGN KEY (gradsssn) REFERENCES gradstudent(sssn)
	);

	create table ExamsOfSection(
	semester varchar(10),
	courseCode varchar(10),
	yearr int,
	sectionId int, 
	issn int,
	examName varchar(30),
	datee date,
	PRIMARY KEY(semester,courseCode,yearr,sectionId,issn,examName),
	FOREIGN KEY (semester,courseCode,yearr,sectionId) REFERENCES sectionn(semester,courseCode,yearr,sectionId),
	FOREIGN KEY (issn) REFERENCES sectionn(issn)
	);

	create table QuestionsOfExam(
	semester varchar(10),
	courseCode varchar(10),
	yearr int,
	sectionId int,
	issn int,
	examName varchar(30),
	qNo varchar(40),
	qPoint int,
	PRIMARY KEY(semester,courseCode,yearr,sectionId,issn,examName,qNo),
	FOREIGN KEY (semester,courseCode,yearr,sectionId,issn,examName)
	REFERENCES ExamsOfSection(semester,courseCode,yearr,sectionId,issn,examName)
	);


	create table StudentGradsPerQuestion(
	semester varchar(10),
	courseCode varchar(10),
	yearr int,
	sectionId int,
	issn int,
	examName varchar(30),
	qNo varchar(40),
	sssn int,
	pointsEarned int,
	PRIMARY KEY(semester,courseCode,yearr,sectionId,issn,examName,qNo,sssn),
	FOREIGN KEY (semester,courseCode,yearr,sectionId,issn,examName,qNo) REFERENCES QuestionsOfExam(semester,courseCode,yearr,sectionId,issn,examName,qNo),
	FOREIGN KEY(sssn) REFERENCES enrollment(sssn)
	);
