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


if (isset($_SESSION['codep'])) {
    $pwd = $_SESSION['codep'];
    $requete = "SELECT gi.user_name, gi.id_user FROM gi WHERE gi.stu_p!=? or gi.stu_p=0";
    $stmt = mysqli_prepare($conn, $requete);
    mysqli_stmt_bind_param($stmt, "s", $pwd); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        echo "La récupération des données a rencontré un problème.";
    } else {
        $nb_etu = mysqli_num_rows($result);
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="present.css">
</head>
<body>
    <h1>La liste des étudiants</h1>
    <h3>Le nombre des étudiants = <?php echo htmlspecialchars($nb_etu);?></h3>
    <table border="1">
        <tr>
            <th>ID User</th>
            <th>Nom</th>
        </tr>
        <?php 
        if ($nb_etu > 0) {
            while ($ligne = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". htmlspecialchars($ligne['id_user']). "</td>";
                echo "<td>". htmlspecialchars($ligne['user_name']). "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan=\"2\">Aucun étudiant trouvé.</td></tr>";
        }
     ?>
    </table>
</body>
</html>
