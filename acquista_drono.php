<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Acquista Droni</title>
  <style>
    body {
      background: #eef;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-box {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      max-width: 600px;
      width: 100%;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-container {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .input, select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background: #007BFF;
      color: white;
      border: none;
      padding: 12px;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }
    .ul {
  width: fit-content;
  height: fit-content;
  background-color: transparent;
  list-style: none;
  margin: 30px auto 0 auto;
  padding: 0;
}
.li {
  margin-bottom: 0px;
}

.button {
  background-color: transparent;
  font-family: sans-serif;
  color: rgb(0, 0, 0);
  border: none;
  font-size: 22px;
  font-weight: 700;
  padding: 10px 30px;
  cursor: pointer;
  position: relative;
  padding-left: 11px;
  text-align: center;
  transition: 0.1s;
  z-index: 1;
}
.p {
  z-index: 2;
  position: relative;
}
.button:hover {
  color: rgb(172, 40, 0);
}
.button:hover::before {
  transform: rotate(0deg);
  width: 100%;
  height: 40px;
  top: 2px;
  border-radius: 3px;
  background-color: rgb(255, 83, 53);
}
.button::before {
  content: "";
  border-radius: 1px;
  position: absolute;
  width: 6px;
  height: 6px;
  background-color: tomato;
  left: -10px;
  top: 19px;
  cursor: pointer;
  transform: rotate(225deg);
  transition: 0.3s;
  z-index: -1;
}
.button:active::before {
  background-color: rgb(255, 38, 0);
}


  </style>
</head>
<body>
  
<div class="form-box">
  <h2>Acquista uno o più Droni</h2>
<form method="POST" class="form-container">
  <input class="input" type="number" name="id_cliente" placeholder="ID Cliente" required>
  <input class="input" type="date" name="data" required>

  <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
    <!-- Drone 1 -->
    <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #ccc; border-radius: 10px; padding: 15px; width: 150px; box-shadow: 0 5px 10px rgba(0,0,0,0.1);">
      <img src="immagini/droni/1.jpg" alt="Drone 1" style="width: 100%; height: 100px; object-fit: cover; border-radius: 5px;">
      <span>Drone Alpha</span>
      <input type="checkbox" name="droni[]" value="1">
    </label>

    <!-- Drone 2 -->
    <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #ccc; border-radius: 10px; padding: 15px; width: 150px; box-shadow: 0 5px 10px rgba(0,0,0,0.1);">
      <img src="immagini/droni/2.jpg" alt="Drone 2" style="width: 100%; height: 100px; object-fit: cover; border-radius: 5px;">
      <span>Drone Beta</span>
      <input type="checkbox" name="droni[]" value="2">
    </label>

    <!-- Drone 3 -->
    <label style="display: flex; flex-direction: column; align-items: center; border: 1px solid #ccc; border-radius: 10px; padding: 15px; width: 150px; box-shadow: 0 5px 10px rgba(0,0,0,0.1);">
      <img src="immagini/droni/3.jpg" alt="Drone 3" style="width: 100%; height: 100px; object-fit: cover; border-radius: 5px;">
      <span>Drone Gamma</span>
      <input type="checkbox" name="droni[]" value="3">
    </label>
    <ul class="ul">
  <li class="li">
    <a href="dashboard.php" style="text-decoration: none;">
      <button class="button" type="button"><p class="p">Home</p></button>
    </a>
  </li>
</ul>

  </div>

  <button type="submit" name="submit">Acquista</button>
</form>

  <?php
  
  if (isset($_POST['submit'])) {
    $id_cliente = $_POST['id_cliente'];
    $data = $_POST['data'];
    foreach ($_POST['droni'] as $id_drone) {
      $stmt = $conn->prepare("INSERT INTO ORDINE (ID_Cliente, ID_Drone, Tipo, Data) VALUES (?, ?, 'Vendita', ?)");
      $stmt->bind_param("iis", $id_cliente, $id_drone, $data);
      $stmt->execute();
    }
    echo "<script>alert('Acquisto effettuato con successo!');</script>";
  }
  ?>
</div>
</body>
</html>