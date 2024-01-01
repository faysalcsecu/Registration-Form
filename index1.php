<?php

include("database.php");

// 1.1 normal insertion its need try catch block
// $sql =  "INSERT INTO users (id, username , password)
//          VALUES (1,'ABDUL KAALM ','kalam12$$4')";
// try {
//     //code...
//     mysqli_query($conn, $sql);
// } catch (mysqli_sql_exception) {
//     //throw $th;
//     echo "Could not register users";
// }



// 1.2 insertion its need try catch bolck
// $password = "55419873";
// $hash = password_hash($password, PASSWORD_DEFAULT);
// $sql =  "INSERT INTO users (username,password)
//          VALUES ('ZAYN ','$hash')";
// try {
//     //code...
//     mysqli_query($conn, $sql);
// } catch (mysqli_sql_exception) {
//     //throw $th;
//     echo "Could not register users";
// }



// 2.deletion
// $sql = "DELETE FROM users WHERE id = 11 ";
// if (mysqli_query($conn, $sql)) {
//     echo "Record deleted successfully!";
// } else {
//     echo "Error: " . mysqli_error($conn);
// }




// 3.findig
// $sql = "SELECT * FROM users WHERE username='FAYSAL' ";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     echo "YOUR AGE IS : {$row["id"]} <br>";
//     echo "YOUR NAME IS : {$row["username"]}  <br>";
//     echo "YOUR NAME IS : {$row["reg_date"]}  <br>";
// } else {
//     echo "No user found";
// }


// 4. this for all users 
$sql = "SELECT * FROM users ";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "YOUR AGE IS : {$row["id"]} <br>";
//         echo "YOUR NAME IS : {$row["username"]}  <br>";
//         echo "YOUR NAME IS : {$row["reg_date"]}  <br>";
//         echo "<br>";
//     }
// } else {
//     echo "No user found";
// }














mysqli_close($conn);
