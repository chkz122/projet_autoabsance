<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "class";
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
} 
if (isset($_POST['envoyer'])) {
    $nom = $_POST['nom_complet'];
    $ide = $_POST['id'];
    ////////////////verification
    $check_sql = "SELECT * FROM gi WHERE id_user =?";
    $stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($stmt, "s", $ide);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row_count = mysqli_num_rows($result);
if ($row_count > 0) {
  die('<script>alert("L\'ID utilisateur existe déjà.");</script>');
}
    $sql = "INSERT INTO gi(id_user, user_name,stu_p) VALUES('$ide','$nom',0)";
    header("Location:http://localhost/projet/stuPwd.html");
    if ($conn->query($sql) === false) {
      echo "Error: ". $sql. "<br>". $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="inscrire.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('c.jpg');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-color: #a2d0df;
    }

    .container {
      
      padding: 20px;
      border-radius: 5px;
      border: #f2f2f2;
      box-shadow: 0 0 10px #16323b;
      max-width: 400px;
      width: 100%;
    }

    form {
     
      color: #f2f2f2;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background-color:   #1c2d32;
      border-radius: 6px;
      margin: 50px;
      padding: 0px 40px;
    }

    input[type=text] {
      width: 100%;
      background-color: rgb(165, 213, 252);
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
    }

    h1 {
      text-align: center;
    }

    input,
    button {
      margin: 10px 0;
      padding: 10px;
      border: 1px solid  #1c2d32;
      border-radius: 3px;
    }

    button {
      cursor: pointer;
      background-color: #1c2d32;
      color: black;
      display: block;
      border: none;
      padding: 10px 20px;
      margin: 0px 90px;
      margin-top: 40px;
      cursor: pointer;
      transition: background-color 0.3s;
      animation: slideIn 1s;
    }

    button {
      width: 200px;
      height: 50px;
      background: #a2d0df;
      transition: width 2s;
      font-size: large;
      color:black;
    }

    button:hover {
      width: 400px;
      color: white;
      background-color:   #1c2d32;
    }
    .cont_global{
      justify-content:center;
    }

    </style>
</head>
<body>
<div class="cont_global">
    <form method="post" action="inscrire.php" name="container">
        <h1>login</h1>
        <lable>USERNAME <i class='bx bxs-user-check'></i></lable>
        <input type="text" name="nom complet" required>
        <lable>USERID <i class='bx bx-user-check'></i></lable>
        <input type="text" name="id" required>
        <input type="submit" value="login" name="envoyer" >
        <p> Ain't subscribed yet ? <a href="stuPwd.html" style="color: white ;">here</a></p><br>
      </form>
      <button type="button" onclick="goToOtherPage('welcome.html')">Back Home</button>
      </div>
<script>
    function goToOtherPage(targetPage) {
      window.location.href = targetPage;
    }
  </script>
        
</body>
</html>