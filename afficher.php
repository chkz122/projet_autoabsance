<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 <style>
    body {
        font-family: Arial, sans-serif;
        color: #333;
        background-color: #f9f9f9;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
        vertical-align: middle;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    h1, h3 {
        text-align: center;
        margin-bottom: 10px;
    }

    h1 {
        color: #007bff;
    }

    h3 {
        color: #666;
    }
</style>



</style>

</head>
<body>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $bdname="class";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$bdname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
     catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }
      $requete="SELECT id_user,user_name FROM gi ORDER BY id_user ASC";
      $result=$conn->query($requete);
   if(!$result){
    echo"la recuperation des donnes a rencentre un probleme";}
    else{
        $nb_etu=$result->rowCount();}

       ?>
       <h1>la liste des etudient</h1>
       <h3> le nomber des etudient =<?php echo $nb_etu ?></h3>
       <table >
        <tr border="1">
            <th>student_id</th>
            <th>student</th>
        </tr>
    <?php 
     while ($ligne= $result->fetch(PDO::FETCH_NUM)){
        echo"<tr>";
        foreach($ligne as $valeur){
            echo "<td>$valeur</td>";
        }
        echo"</tr>";
     }  
 ?>
</table>
<?php 
$result->closeCursor();

?>


</body>
</html>