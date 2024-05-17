<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "class";
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
} 
session_start();
//////////////////////
$dureeSpecifique = 100;
if(isset($_POST['sent']) && !empty($_POST['sent'])){
    if(isset($_SESSION['codep']) && !empty($_SESSION['codep']) && isset($_SESSION['tempcode'])){
        $tempscreation=$_SESSION['tempcode'];
        $dureedepassee = time() - $tempscreation;
        if ($dureedepassee > $dureeSpecifique){
            echo "<script>alert('Le temps est dépassé');</script>";
        }else{
            $ide = isset($_POST['appoge'])? $_POST['appoge'] : null;
            $code=$_POST['code'];
            $check_sql = "SELECT * FROM gi WHERE id_user =?";
            $stmt = mysqli_prepare($conn, $check_sql);
             mysqli_stmt_bind_param($stmt, "s", $ide);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row_count = mysqli_num_rows($result);
            if ($row_count == 0) {die('<script>alert("L\'ID utilisateur pas existe");</script>');}
            else{
                $sql = "UPDATE gi
               SET stu_p = '$code'
               WHERE id_user= '$ide' ";
               if ($conn->query($sql) === false) {
              echo "Error: ". $sql. "<br>". $conn->error;
               }
               $conn->close();

            }
        }
    }else{echo "<script>alert('n'est pas un code');</script>";}
}else{
    echo"essayer";}

?>
