<?php
session_start();
if (isset($_POST['sent1']) && !empty($_POST['sent1'])){
  $valeur = $_POST['PSS'];
    $_SESSION['codep'] = $valeur;
    $_SESSION['tempcode'] = time();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="prof.css">
    <link href='https://rrt.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;}
.container {
    max-width: 600px;
    margin: auto;
    padding: 40px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: #fff;}
h1 {
    text-align: center;
    margin-bottom: 30px;}
label {
    display: block;
    margin-top: 20px;
    font-weight: bold;}
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;}
input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;}
input[type="submit"]:hover {
    background-color: #0056b3;}
</style>
</head>
<body>
    <form method="post" action="" name="container" >
        <h1>HELLO PROF</h1>
        
        <label for="PSS">PASSWORD<i class='bx bxs-key'></i></label>
        <input type="password" id="PSS" name="PSS" required> 
        <input type="submit" name="sent1" value="sent" >
    </form>
    <script>
        document.querySelector("form[name='container']").addEventListener("submit", function(event) {
            let pwd = document.getElementById("PSS");
            if (pwd.value == "0") { 
                event.preventDefault();
                alert("Veuillez entrer un mot de passe valide deffirent a 0");
            }else{
                alert("Le code est envoyé");
            }
        });
    </script>
</body>
</html>
