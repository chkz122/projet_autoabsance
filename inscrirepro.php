<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form method="post" action="" name="container">
        <h1>Login</h1>
        <lable>USERNAME <i class='bx bxs-user-check'></i></lable>
        <input type="text" name="nom complet" id="name" required>
        <lable>PASSWORD<i class='bx bx-user-check'></i></lable>
        <input type="text" name="id" id="pass" required>
       <input type="submit" value="login" name="envoyer" id="btn"></form>
       <button type="button" onclick="goToOtherPage('welcome.html')">Back Home</button>
       </div>
</body>
<script>
   function goToOtherPage(targetPage) {
      window.location.href = targetPage;
    }
  let form = document.querySelector("form[name='container']");
  form.addEventListener("submit", function(event){
    event.preventDefault()
    let passwd = document.getElementById("pass");
    let nom=document.getElementById("name");
    if(passwd.value == "12345" && nom.value =="erraji"){
      window.location.href = 'http://localhost/projet/pro_nav.html';
    }else {
      alert("les informations n'est pas correct");
    }
  });
</script>

</html>