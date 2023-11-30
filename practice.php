
// $db = "bookshop";


 // 1. mysqli object oriented method for connection

// $connect = new mysqli($host,$user,$pass);

// if($connect->connect_error){
//     die("connection failed :" . $connect_error);
// }
// else{
//     echo "connection successfully done";
// }


//to close the connection
// $connect->close();


// 2. mysqli procedural method

// $connect = mysqli_connect($host,$user,$pass) or die("failed");
// mysqli_close($connect);



// 3. PDO(php data method) method

// try{
//     $connect = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
//     $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
//     echo "connection done";

// }
// catch(PDOException $e){
//     echo "connection failed :" . $e->getMessage();
// }

// $connect = null;

