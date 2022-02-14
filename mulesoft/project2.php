<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="submit" Value="Connect to MySQL Server & Insert data in a table">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
echo "Connected successfully<br>";
}
$sql =  "CREATE TABLE movie_details(moviename varchar(200), leadactorname varchar(200), leadactressname varchar(200), yearofrelease int, directorname varchar(200))";
$result = mysqli_query($conn, $sql);
if($result){
  echo "The table is created successfully<br>";
}
else{
  echo "The table was not created because of this error" .mysqli_error
  ($conn);
}
$sql = "INSERT INTO movie_details VALUES ('Kabir Singh','Ranveer Kapoor','kiara Adwani',2019,'Sandip Reddy Vanga');";
$sql .= "INSERT INTO movie_details VALUES ('Bajirao Mastani','Ranveer Singh','Deepika Padukone',2015,'Sanjay Leela Bhnasali' );";
$sql .= "INSERT INTO movie_details VALUES ('Mohobatein','Shah Rukh Khan','Shameta Shetty',2000,'Aditya Chopra');";
$sql .= "INSERT INTO movie_details VALUES ('Rab Ne Bana Di Jodi','Shah Rukh Khan','Anushka Sharma',2008,'Aditya Chopra');";
$sql .= "INSERT INTO movie_details VALUES ('Uri','Vicky Kaushal','Yami Gautam',2019,'Aditya Dhar' );";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>

</body>
</html>