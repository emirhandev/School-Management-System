insert into Course  Values
(7,"Database Systems","COMP2222",3,"COMP2112"),
(5,"Human Computer Interaction","COMP2502",3,null),
(5,"Requirements Analysis","SOFT3511",3,null),
(6,"Probability","MATH2201",3,null),
(4,"Logic Design","ELEC1411",3,null);

insert into Instructor values
(123456789,"Instructor 1","associate",12500,0,"Department A"),
(246801234,"Instructor 2","assistant",8500,0,"Department A"),
(135796489,"Instructor 3","visiting",10000,0,"Department A"),
(528491658,"Instructor 4","research",9500,0,"Department C"),
(463785168,"Instructor 5","adjunct",10000,0,"Department B");

insert into sectionn values 
("Spring","COMP2222",2023,1,50,123456789),
("Fall","COMP2222",2022,1,50,246801234),
("Spring","COMP2502",2022,1,30,123456789),
("Fall","COMP2502",2021,1,30,246801234),
("Spring","SOFT3511",2021,1,50,246801234),
("Spring","MATH2201",2019,1,70,528491658),
("Spring","ELEC1411",2018,1,70,463785168);

insert into BuildClass values 
("DMF",121,250),
("LMF",316,100),
("AMF",215,75),
("DMF",221,200),
("LMF",116,100);

insert into Department values
("Department A",700000,123456789,"DMF"),
("Department B",500000,463785168,"DMF"),
("Department C",400000,528491658,"AMF"),
("Department D",100000,135796489,"AMF"),
("Department E",200000,246801234,"AMF");

insert into student values 
(159357824,"Ugrad",123456789,1526,"Department A","20SOFT1014","Student 1"),
(440846759,"Ugrad",246801234,1526,"Department A","20SOFT1030","Student 2"),
(505540770,"Ugrad",135796489,1526,"Department A","21SOFT1016","Student 3"),
(765382468,"UGrad",528491658,7625,"Department C","20MATH4585","Student 4"),
(387967877,"UGrad",463785168,2457,"Department B","21PS5841","Student 8"), 
(404248680,"Grad",135796489,4578,"Department A","218COMP1548","Student 5"),
(888991523,"Grad",463785168,2456,"Department B","218PS2142","Student 6"),
(362465385,"Grad",528491658,7624,"Department C","217MATH5684","Student 7"),
(429774757,"Grad",528491658,7624,"Department C","215MATH5678","Student 8"),
(248887017,"Grad",123456789,4578,"Department A","216SOFT2517","Student 9");

insert into Curricula values
(1526,"UGrad","Department A"),
(4578,"Grad","Department A"),
(2456,"Grad","Department B"),
(2457,"UGrad","Department B"),
(7625,"UGrad","Department C"),
(7624,"Grad","Department C");

insert into curriculaCourses values
("COMP2222","Department A",1526),
("COMP2222","Department A",4578),
("COMP2502","Department A",4578),
("COMP2502","Department A",1526),
("SOFT3511","Department A",1526),
("SOFT3511","Department A",4578),
("MATH2201","Department C",7625),
("MATH2201","Department C",7624),
("ELEC1411","Department B",2456),
("ELEC1411","Department B",4266);

insert into TimeSlot values
("Monday",1),
("Monday",2),
("Monday",3),
("Monday",4),
("Monday",5),
("Tuesday",1),
("Tuesday",2),
("Tuesday",3),
("Tuesday",4),
("Tuesday",5),
("Wednesday",1),
("Wednesday",2),
("Wednesday",3),
("Wednesday",4),
("Wednesday",5),
("Thursday",1),
("Thursday",2),
("Thursday",3),
("Thursday",4),
("Thursday",5),
("Friday",1),
("Friday",2),
("Friday",3),
("Friday",4),
("Friday",5);

insert into enrollment values
(159357824,"COMP2222","BA","Spring",2023,1,123456789,"DMF",121,"Monday",1),
(248887017,"COMP2222","DD","Spring",2023,1,123456789,"DMF",121,"Monday",1),
(440846759,"COMP2222","BB","Spring",2023,1,123456789,"DMF",121,"Monday",1),
(159357824,"SOFT3511","BB","Spring",2021,1,246801234,"DMF",221,"Wednesday",3), 
(440846759,"SOFT3511","CB","Spring",2021,1,246801234,"DMF",221,"Wednesday",3), 
(440846759,"COMP2502","DD","Spring",2022,1,528491658,"AMF",121,"Friday",1),  
(440846759,"COMP2502","F","Fall",2021,1,135796489,"AMF",121,"Friday",1),
(505540770,"COMP2222","DC","Fall",2022,1,135796489,"LMF",116,"Tuesday",2),
(765382468,"MATH2201","DC","Spring",2019,1,528491658,"AMF",121,"Friday",4),
(387967877,"ELEC1411","CC","Spring",2018,1,463785168,"DMF",316,"Monday",5),
(159357824,"COMP2502","AA","Spring",2022,1,528491658,"AMF",121,"Friday",1);

insert into emails values 
(159357824,"20SOFT1014@isik.edu.tr"),
(159357824,"20SOFT1014@gmail.com"),
(440846759,"20SOFT1030@isik.edu.tr"),
(440846759,"20SOFT1030@outlook.com.tr"),
(505540770,"21SOFT1016@isik.edu.tr"),
(888991523,"218PS2142@isik.edu.tr"),
(362465385,"217MATH5684@isik.edu.tr"),
(765382468,"20MATH4585@isik.edu.tr"),
(387967877,"21PS5841@isik.edu.tr"),
(404248680,"218COMP1548@isik.edu.tr"),
(429774757,"215MATH5678@isik.edu.tr"),
(248887017,"216SOFT2517@isik.edu.tr");

insert into gradstudent values 
(888991523,463785168),
(362465385,528491658),
(404248680,135796489),
(429774757,528491658),
(248887017,123456789);

insert into prevDegrees values 
("Bahçeşehir University","Freshman",2018,888991523),
("Bahçeşehir University","Bachelor",2019,888991523),
("İstinye University","Bachelor",2017,362465385),
("İstinye University","Freshman",2015,362465385),
("İstanbul University","Freshman",2016,404248680);


insert into Project values
(123456789,"Project 1",1000000,'2018-10-10','2021-7-4',"Cloud","Department A"),
(246801234,"Project 2",1500000,'2017-5-4','2020-8-3',"Automation","Department A"),
(528491658,"Project 3",1570000,'2021-1-8','2023-3-4',"Cryptology","Department C"),
(135796489,"Project 4",180000,'2023-4-3','2025-2-6',"Android Application","Department A"),
(123456789,"Project 5",1905000,'2023-12-3','2024-8-3',"Network","Department A"),
(463785168,"Project 6",1903000,'2020-4-7','2021-6-4',"Electric","Department B");

insert into InstrInProjects values
(123456789,"Project 1",246801234,5),
(123456789,"Project 1",463785168,5), 
(123456789,"Project 1",135796489,5),
(246801234,"Project 2",123456789,5),
(528491658,"Project 3",463785168,2),
(528491658,"Project 3",123456789,2),
(135796489,"Project 4",123456789,3),
(123456789,"Project 5",246801234,4),
(123456789,"Project 5",463785168,4),
(463785168,"Project 6",528491658,6);

insert into GradsInProject values
(123456789,"Project 1",404248680,5),
(246801234,"Project 2",404248680,5),
(528491658,"Project 3",362465385,2),
(123456789,"Project 3",404248680,4),
(135796489,"Project 4",404248680,3),
(123456789,"Project 5",248887017,4), 
(123456789,"Project 5",888991523,4), 
(123456789,"Project 5",362465385,4), 
(123456789,"Project 5",429774757,4), 
(463785168,"Project 6",888991523,6);


insert into ExamsOfSection values
("Spring","COMP2222",2023,1,123456789,"Midterm 1",'2023-3-10'),
("Spring","COMP2222",2023,1,123456789,"Midterm 2",'2023-4-10'),
("Spring","COMP2222",2023,1,123456789,"Final",'2023-6-1'),

("Fall","COMP2222",2022,1,246801234,"Midterm 1",'2022-10-10'),
("Fall","COMP2222",2022,1,246801234,"Midterm 2",'2022-11-10'),
("Fall","COMP2222",2022,1,246801234,"Final",'2022-12-10'),

("Spring","COMP2502",2022,1,123456789,"Midterm 1",'2022-3-11'),
("Spring","COMP2502",2022,1,123456789,"Midterm 2",'2022-4-11'),
("Spring","COMP2502",2022,1,123456789,"Final",'2022-6-2'),

("Fall","COMP2502",2021,1,246801234,"Midterm 1",'2021-10-11'),
("Fall","COMP2502",2021,1,246801234,"Midterm 2",'2021-11-11'),
("Fall","COMP2502",2021,1,246801234,"Final",'2021-12-2'),

("Spring","SOFT3511",2021,1,246801234,"Midterm 1",'2021-3-12'),
("Spring","SOFT3511",2021,1,246801234,"Midterm 2",'2021-4-12'),
("Spring","SOFT3511",2021,1,246801234,"Final",'2021-6-3'),

("Spring","MATH2201",2019,1,528491658,"Midterm 1",'2019-3-13'),
("Spring","MATH2201",2019,1,528491658,"Midterm 2",'2019-5-2'),
("Spring","MATH2201",2019,1,528491658,"Final",'2019-6-4'),

("Spring","ELEC1411",2018,1,463785168,"Midterm 1",'2018-3-14'),
("Spring","ELEC1411",2018,1,463785168,"Midterm 2",'2018-5-14'),
("Spring","ELEC1411",2018,1,463785168,"Final",'2018-6-5');

insert into QuestionsOfExam values
("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q1",50),
("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q2",50),
("Spring","COMP2222",2023,1,123456789,"Midterm 2","Q1",100),
("Spring","COMP2222",2023,1,123456789,"Final","Q1",40),
("Spring","COMP2222",2023,1,123456789,"Final","Q2",60),

("Fall","COMP2502",2021,1,246801234,"Midterm 1","Q1",30),
("Fall","COMP2502",2021,1,246801234,"Midterm 1","Q2",70),
("Fall","COMP2502",2021,1,246801234,"Midterm 2","Q1",35),
("Fall","COMP2502",2021,1,246801234,"Midterm 2","Q2",35),
("Fall","COMP2502",2021,1,246801234,"Midterm 2","Q3",30),
("Fall","COMP2502",2021,1,246801234,"Final","Q1",25),
("Fall","COMP2502",2021,1,246801234,"Final","Q2",75),

("Spring","MATH2201",2019,1,528491658,"Midterm 1","Q1",100),
("Spring","MATH2201",2019,1,528491658,"Midterm 2","Q1",50),
("Spring","MATH2201",2019,1,528491658,"Midterm 2","Q2",50),
("Spring","MATH2201",2019,1,528491658,"Final","Q1",50),
("Spring","MATH2201",2019,1,528491658,"Final","Q2",50);

insert into StudentGradsPerQuestion values 
("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q1",159357824,50),
("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q2",159357824,15),

("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q1",440846759,45),
("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q2",440846759,25),

("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q1",248887017,0),
("Spring","COMP2222",2023,1,123456789,"Midterm 1","Q2",248887017,40),

("Fall","COMP2502",2021,1,246801234,"Midterm 2","Q1",440846759,10),
("Fall","COMP2502",2021,1,246801234,"Midterm 2","Q2",440846759,0),
("Fall","COMP2502",2021,1,246801234,"Midterm 2","Q3",440846759,10),

("Spring","MATH2201",2019,1,528491658,"Final","Q1",765382468,30),
("Spring","MATH2201",2019,1,528491658,"Final","Q2",765382468,25);
