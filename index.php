<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Benvenuto su DroneTech</title>
  <style>
    
    body {
      font-family: 'Segoe UI', sans-serif;
      background-image: url('background.jpg');
      background-size: cover;
      background-position: center;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-box {
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.3);
      max-width: 400px;
      width: 100%;
    }

    .form-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .form-container {
      display: flex;
      flex-direction: column;
      gap: 12px;
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
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Registrazione Cliente</h2>
    <form method="POST" class="form-container">
      <input class="input" type="text" name="nome" placeholder="Nome" required>
      <input class="input" type="text" name="cognome" placeholder="Cognome" required>
      <input class="input" type="email" name="email" placeholder="Email" required>
      <input class="input" type="text" name="telefono" placeholder="Telefono" required>
      <select class="input" name="tipo" required>
        <option value="">Tipo Cliente</option>
        <option value="Privato">Privato</option>
        <option value="Azienda">Azienda</option>
      </select>
      <input class="input" type="text" name="cf" placeholder="Codice Fiscale / P.IVA" required>
      <button type="submit" name="registra">Registrati</button>
    </form>

    <?php
    if (isset($_POST['registra'])) {
      $stmt = $conn->prepare("INSERT INTO CLIENTE (Nome, Cognome, Email, Telefono, Tipo, CodiceFiscale_PIVA) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssss", $_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['telefono'], $_POST['tipo'], $_POST['cf']);
      $stmt->execute();
      echo "<script>window.location.href = 'dashboard.php';</script>";
    }
    ?>
  </div>
</body>
</html>