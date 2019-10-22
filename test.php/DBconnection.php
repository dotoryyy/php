<? //Database 연결
$servername = "funlab.kr";
$username = "phpstudy";
$password = "phpstudy!@#123";
$dbname = "phpstudy";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
//Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
};
//echo 'Conncted successfully';
?>