

<?php
//Group 9
//Sunnie Qu: chang.qu@vanderbilt.edu
//Chuyun Sun: chuyun.sun@vanderbilt.edu
//Chang Guo: chang.guo@vanderbilt.edu
//Homework 3

//======================================================================
// Connect the PHP file from the frontend to the backend MySQL database
// Creat the database
//======================================================================

$servername = "127.0.0.1";
$username = "username";
$password = "password";



// Create connection
$conn = new mysqli_connect($servername, $username, $password);

// Create database
$sql = "CREATE DATABASE MakerSiteDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


//======================================================================
// Create the Tutorial table, check for error, and populate
//======================================================================


// sql to create tutorial table
$sql_tutorial = "CREATE TABLE Tutorial (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    TutorialName VARCHAR(500) NOT NULL,
    TutorialType VARCHAR(50) NOT NULL,
    TutorialTheme VARCHAR(100) NOT NULL,
    TutorialLink VARCHAR(500) NOT NULL
)";

if ($conn->query($sql_tutorial) === TRUE) {
echo "Table Tutorial created successfully";
} else {
echo "Error creating tutorial table: " . $conn->error;
}

//variables for tutorial theme
$3d = '3D Making';
$laser = 'Laser Cutting';
$cricut = 'Cricut Maker';

//variable for tutorial type
$vid ='Video';
$article = 'Website Article';

//Insert one test value into tutorial table
$sql_tutorial = "Insert INTO Tutorial (id, TutorialName, TutorialType, TutorialTheme, TutorialLink)
VALUE (1, 'testName01', 'testType01', 'testTheme01', 'testLink01')";

//ErrorCheck1: check the above insert
if(!$conn -> query($sql_tutorial)){
    echo "Error 1: Error inserting" . $sql_tutorial . "<br>" . $conn-> error;
}else{
    echo "Message 1: Data inserted correctly.";
}

//Insert Laser Cutting Video into tutorial table
$sql_tutorial = "Insert INTO Tutorial (id, TutorialName, TutorialType, TutorialTheme, TutorialLink)
VALUE (2, 'How to use Laser Cutting', $vid , $laser , 'https://www.youtube.com/watch?v=sdACSB8GH3Y')";

//ErrorCheck2: to check the insertion for Laser Cutting Video
if(!$conn -> query($sql_tutorial)){
    echo "Error 2: Error inserting Laser Cutting video" . $sql_tutorial . "<br>" . $conn-> error;
}else{
    echo "Message 2: Data inserted correctly.";
}


//Insert 3D Printer Video into tutorial table
$sql_tutorial = "Insert INTO Tutorial (id, TutorialName, TutorialType, TutorialTheme, TutorialLink)
VALUE (3, 'Using 3D Printer to Make Profit', $vid , $3d , 'https://www.youtube.com/watch?v=PceI1AtgFvo')";

//ErrorCheck3: to check the insertion for 3D Printer Video- Profit
if(!$conn -> query($sql_tutorial)){
    echo "Error 3: Error inserting 3D Printing video(profit video)" . $sql_tutorial . "<br>" . $conn-> error;
}else{
    echo "Message 3: Data inserted correctly.";
}


//Insert Beginner's Guide for 3D Printer Video into tutorial table
$sql_tutorial = "Insert INTO Tutorial (id, TutorialName, TutorialType, TutorialTheme, TutorialLink)
VALUE (4, 'Beginner's Guide to 3D Printer', $vid , $3d , 'https://www.youtube.com/watch?v=T-Z3GmM20JM')";

//ErrorCheck4: to check the insertion for 3D Printer Video
if(!$conn -> query($sql_tutorial)){
    echo "Error 4: Error inserting 3D Printing video(Beginner Guide Video)" . $sql_tutorial . "<br>" . $conn-> error;
}else{
    echo "Message 3: Data inserted correctly.";
}


//Insert Cricut Maker Video into tutorial table
$sql_tutorial = "Insert INTO Tutorial (id, TutorialName, TutorialType, TutorialTheme, TutorialLink)
VALUE (5, 'How to use a Cricut', $vid, $cricut, 'https://www.youtube.com/watch?v=F0qzvg_xf9c')";

//ErrorCheck5: to check the insertion for Cricut Maker Video
if(!$conn -> query($sql_tutorial)){
    echo "Error 5: Error inserting cricket maker video" . $sql_tutorial . "<br>" . $conn-> error;
}else{
    eho "Message 5: Data inserted correctly.";
}


//Insert 3D Printing Article into tutorial table
$sql_tutorial = "Insert INTO Tutorial (id, TutorialName, TutorialType, TutorialTheme, TutorialLink)
VALUE (6, 'Beginner's Guide for 3D Printing', $article, $3d, 'https://3dinsider.com/3d-printing-guide/')";

//ErrorCheck6: to check the insertion for Cricut Maker Video
if(!$conn -> query($sql_tutorial)){
    echo "Error 6: Error inserting 3d Printing Article" . $sql_tutorial . "<br>" . $conn-> error;
} else{
    eho "Message 6: Data inserted correctly.";
}


//======================================================================
// Create the PastEvents table, check for error, and populate
//======================================================================

// sql to create Past Events table
$sql_past_events = "CREATE TABLE PastEvents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    EventName VARCHAR(200) NOT NULL,
    EventTime DATETIME NOT NULL,
    AttendentNum INT(4) UNSIGNED,
    Host VARCHAR(200) NOT NULL,
    EventLocation VARCHAR(300) NOT NULL,
    DifficultyLevel VARCHAR(50) NOT NULL,
    EventTheme VARCHAR(150)
)";

if ($conn->query($sql_past_events) === TRUE) {
    echo "Table Past Event created successfully";
} else {
    echo "Error creating Past Event table: " . $conn->error;
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (1, 'Buggies and Nuggies', 'Aug. 30th, 2019' , 'Maker Club' , 'The Wondry Floor 2',
'No prior experience required', 'Build cars and race them while enjoying nuggets!')";

//ErrorCheck1: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
    echo "Error 1: Error inserting id 1 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
    echo "Message 1: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (2, 'AI Speaker', 'Sept. 15th, 2019' , 'Maker Club' , 'Featheringill 134',
'No prior experience required', 'Built Artificial Intelligence speaker that can facilitate day to day
life. You can ask it to turn off or turn on your lights (and more) once connected to your room!')";

//ErrorCheck2: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
    echo "Error 2: Error inserting id 2 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
    echo "Message 2: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (3, 'Paper Plane Party', 'Sep. 30th, 2019' , 'Maker Club' , 'Featheringill 136',
'No prior experience required', 'Make paper plane that could travel the longest using
whatever material you need! We have cardboard, leftover plastic plate, foam, and more!')";

//ErrorCheck3: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
    echo "Error 3: Error inserting id 3 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
    echo "Message 3: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (4, 'Engineering Skills 101', 'Oct. 30th, 2019' , 'Maker Club' , 'The Wondry FLoor 2',
'No prior experience required', 'Come to the Wondry to learn about relevant Engineering skills, such
as laser cutting, soldering, and more!')";

//ErrorCheck4: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
    echo "Error 4: Error inserting id 4 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
    echo "Message 4: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (5, 'Electric Mice', 'Nov. 15th, 2019' , 'Maker Club' , 'The Wondry FLoor 2',
'No prior experience required', 'Come to the Wondry to build electric mice that runs around!
Learn about soldering and laser cutting skills')";

//ErrorCheck5: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
echo "Error 5: Error inserting id 5 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
echo "Message 5: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (6, 'Maker Social', 'Jan. 20th, 2020' , 'Maker Club' , 'The Wondry FLoor 2',
'No prior experience required', 'Come to the Wondry to hang out with fellow makers!
There will be Engineering games and prizes')";

//ErrorCheck6: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
    echo "Error 6: Error inserting id 6 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
    echo "Message 6: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (7, 'Robot Battling', 'Feb. 15th, 2020' , 'Maker Club' , 'The Wondry FLoor 2',
'No prior experience required', 'Come to the Wondry to build battling robots! There will
be prizes for the winner of the robot battles')";

//ErrorCheck7: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
echo "Error 7: Error inserting id 7 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
echo "Message 7: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (8, 'Laser Cutting Workshop', 'Apr. 28th, 2020' , 'Maker Club' , 'Olin Hall 412',
'No prior experience required', 'Come to the Digital Fabrication Lab in Olin Hall to learn
about cool Engineering Skills!')";

//ErrorCheck8: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
echo "Error 8: Error inserting id 8 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
echo "Message 8: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (9, 'Lab Tour and 3D Printing', 'Sept. 1st, 2021' , 'Maker Club' , 'Olin Hall 412',
'No prior experience required', 'Come tour around Maker Club's new space: the Digital Fabrication Lab!
Learn about useful 3D printing skill')";

//ErrorCheck9: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
echo "Error 9: Error inserting id 9 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
echo "Message 9: Data inserted correctly.";
}

//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (10, 'CAD Workshop', 'Sept. 7th, 2021' , 'Maker Club' , 'Olin Hall 412',
'No prior experience required', 'Learn about using CAD!')";

//ErrorCheck10: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
echo "Error 10: Error inserting id 10 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
echo "Message 10: Data inserted correctly.";
}


//Insert event data into past event table
$sql_past_events = "Insert INTO PastEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (11, 'Injection Molding', 'Oct. 13th, 2021' , 'Maker Club' , 'Olin Hall 412',
'No prior experience required', 'Come to the digital fabrication lab to injection mold
your own Vanderbilt Bottle Opener!')";

//ErrorCheck11: to check the insertion for the event
if(!$conn -> query($sql_past_events)){
echo "Error 11: Error inserting id 11 past event info" . $sql_past_events . "<br>" . $conn-> error;
}else{
echo "Message 11: Data inserted correctly.";
}

//======================================================================
// Create the FutureEvents table, check for error, and populate
//======================================================================


// sql to create Future Events table
$sql_future_events = "CREATE TABLE FutureEvents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    EventName VARCHAR(200) NOT NULL,
    EventTime DATETIME NOT NULL,
    Host VARCHAR(200) NOT NULL,
    EventLocation VARCHAR(300) NOT NULL,
    DifficultyLevel VARCHAR(50) NOT NULL,
    EventTheme VARCHAR(150)
)";

if ($conn->query($sql_future_events) === TRUE) {
    echo "Table Future Events created successfully";
} else {
    echo "Error creating Future Events table: " . $conn->error;
}


//Insert event data into tutorial table
$sql_future_events = "Insert INTO FutureEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (1, 'Maker Social Event', 'Nov. 17, 2021', 'Maker Club', 'Featheringill 134',
'No prior experience required', 'Hang out with fellow makers and enjoy pizza!')";

//ErrorCheck1: to check the insertion for Laser Cutting Video
if(!$conn -> query($sql_future_events)){
    echo "Error 1: Error inserting id 1 future event info" . $sql_future_events . "<br>" . $conn-> error;
}else{
    echo "Message 1: Data inserted correctly.";
}

//Insert event data into tutorial table
$sql_future_events = "Insert INTO FutureEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (2, 'De-stress Fest', 'Nov. 30, 2021', 'Maker Club', 'TBA', 'No prior experience required',
'De-stress with the Maker Club before the finals!')";

//ErrorCheck2: to check the insertion for Laser Cutting Video
if(!$conn -> query($sql_future_events)){
    echo "Error 2: Error inserting id 2 future event info" . $sql_future_events . "<br>" . $conn-> error;
}else{
    echo "Message 2: Data inserted correctly.";
}

//Insert event data into tutorial table
$sql_future_events = "Insert INTO FutureEvents (id, EventName, EventTime, Host, EventLocation,
DifficultyLevel, EventTheme)
VALUE (3, 'Engineering 101', 'Jan. 17, 2021', 'Maker Club', 'TBA', 'No prior experience required',
'Come learn about relevant Engineering skills, such as laser cutting, soldering, and more!')";

//ErrorCheck3: to check the insertion for Laser Cutting Video
if(!$conn -> query($sql_future_events)){
    echo "Error 3: Error inserting id 3 future event info" . $sql_future_events . "<br>" . $conn-> error;
}else{
    echo "Message 3: Data inserted correctly.";
}


//======================================================================
// Create the LogIn table, check for error, and populate
//======================================================================


// sql to create Log In Credential table
$sql_log_in = "CREATE TABLE LogIn (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(100) NOT NULL,
    LastName VARCHAR(100) NOT NULL,
    UserName VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    MemberType VARCHAR(20) NOT NULL
)";


//testing connection of the login table 
if ($conn->query($sql_log_in) === TRUE) {
    echo "Table Log In created successfully";
} else {
    echo "Error creating Log In table: " . $conn->error;
}

//Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (1, 'testFName01','testLName01', 'testUName01','testPWord01', 'testEmail01', 'testType01')";

//ErrorCheck1: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 1: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 1: Data inserted correctly.";
}


//Log_In2: Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (2, 'Chang','Guo', 'cguo1','test', 'chang.guo@vanderbilt.edu', 'exec')";

//ErrorCheck2: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 2: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 2: Data inserted correctly.";
}


//Log_In3: Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (3, 'XXX','XXX', 'admin','test', 'MakeClub@vanderbilt.edu', 'exec')";

//ErrorCheck3: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 3: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 3: Data inserted correctly.";
}


//Log_In4: Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (4, 'XXXX','XXXX', 'finance','test', 'MakeClub@vanderbilt.edu', 'exec')";

//ErrorCheck4: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 4: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 4: Data inserted correctly.";
}


//Log_In5: Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (5, 'XXXXX','XXXXX', 'admin2','test', 'MakeClub@vanderbilt.edu', 'exec')";

//ErrorCheck5: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 5: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 5: Data inserted correctly.";
}


//Log_In6: Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (6, 'Qu','Chang', 'qchang1','test', 'qu.chang@vanderbilt.edu', 'user')";

//ErrorCheck6: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 6: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 6: Data inserted correctly.";
}


//Log_In7: Insert one test value into log in table
$sql_log_in = "Insert INTO LogIn (id, FirstName, LastName, UserName,Password, Email, MemberType )
VALUE (7, 'Amanda','Sun', 'csun1','test', 'chuyun.sun@vanderbilt.edu', 'user')";

//ErrorCheck7: check the above insert
if(!$conn -> query($sql_log_in)){
    echo "Log In Error 7: Error inserting" . $sql_log_in . "<br>" . $conn-> error;
}else{
    echo "Log In Message 7: Data inserted correctly.";
}

//======================================================================
// Create the UserComment table, check for error, and populate
//======================================================================


// sql to create User Comment table
$sql_user_comments = "CREATE TABLE UserComment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(300) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Message VARCHAR(1000) NOT NULL
)";

//testing connection of the user comment table 
if ($conn->query($sql_user_comments) === TRUE) {
    echo "Table User Comments created successfully";
} else {
    echo "Error creating User Comments table: " . $conn->error;
}


//Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (1, 'testName01', 'testEmail01', 'testMessage01')";

//ErrorCheck1: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 1: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 1: Data inserted correctly.";
}


//User_Comment 2: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (2, 'Gabby', 'gabby.h@gmail.com', 'I like this event')";

//ErrorCheck2: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 2: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 2: Data inserted correctly.";
}


//User_Comment 3: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (3, 'Jake', 'Jake.hop@vanderbilt.edu', 'I like this event lol')";

//ErrorCheck 3: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 3 Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 3: Data inserted correctly.";
}


//User_Comment 4: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (4, 'Teressa', 'teressa@gmail.com', 'I wish to see more laser cutting articles')";

//ErrorCheck4: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 4: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 4: Data inserted correctly.";
}


//User_Comment 5: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (5, 'Janet', 'janet099@gmail.com', 'I wish to see more 3d printing videos.')";

//ErrorCheck5: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 5: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 5: Data inserted correctly.";
}


//User_Comment 6: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (6, 'shx', 'shx@yahoo.com', 'lol')";

//ErrorCheck6: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 6: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 6: Data inserted correctly.";
}


//User_Comment 7: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (7, 'anonymousmonkey', 'fakeemail@gmail.com', 'justing saying hi')";

//ErrorCheck7: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 7: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 7: Data inserted correctly.";
}


//User_Comment 8: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (8, 'laserFan', 'laserfan@gmail.com', 'When is the next laser cutting event?')";

//ErrorCheck8: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 8: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 8: Data inserted correctly.";
}


//User_Comment 9: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (9, 'secretcomplainer', 'complain@gmail.com', 'We need to have events MORE often!!!!!')";

//ErrorCheck9: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 9: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 9: Data inserted correctly.";
}


//User_Comment 10: Insert one test value into user comment table
$sql_user_comments = "Insert INTO UserComment (id, Name, Email, Message)
VALUE (10, 'GHinkley', 'ghinkley@gmail.com', 
'Who should I contact if I need more info about 3d printing? I am really interested in participating but I am not a member.')";

//ErrorCheck9: check the above insert
if(!$conn -> query($sql_user_comments)){
    echo "User Comment Error 10: Error inserting" . $sql_user_comments . "<br>" . $conn-> error;
}else{
    echo "User Comment Message 10: Data inserted correctly.";
}

$conn ->close
?>


