<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Registrazione Cliente</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    .form {
      display: flex;
      flex-direction: column;
    }
    .title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .subtitle {
      font-size: 14px;
      color: #666;
      margin-bottom: 20px;
    }
    .form-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      margin-top: 20px;
      padding: 10px;
      background: #007BFF;
      border: none;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    .form-section {
      margin-top: 15px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="form-box">
  <form class="form" method="POST">
    <span class="title">Registrazione Cliente</span>
    <span class="subtitle">Inserisci i tuoi dati per registrarti.</span>
    <div class="form-container">
      <input type="text" class="input" name="nome" placeholder="Nome" required>
      <input type="text" class="input" name="cognome" placeholder="Cognome" required>
      <input type="email" class="input" name="email" placeholder="Email" required>
      <input type="text" class="input" name="telefono" placeholder="Telefono" required>
      <select class="input" name="tipo" required>
        <option value="">Tipo Cliente</option>
        <option value="Privato">Privato</option>
        <option value="Azienda">Azienda</option>
      </select>
      <input type="text" class="input" name="cf" placeholder="Codice Fiscale / P.IVA" required>
    </div>
    <button type="submit" name="submit">Registra</button>
  </form>
  <div class="form-section">
    <p><a href="index.html">Torna alla Home</a></p>
  </div>
</div>

<?php
if(isset($_POST['submit'])){
  $stmt = $conn->prepare("INSERT INTO CLIENTE (Nome, Cognome, Email, Telefono, Tipo, CodiceFiscale_PIVA) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['telefono'], $_POST['tipo'], $_POST['cf']);
  $stmt->execute();
  echo "<script>alert('Cliente registrato con successo!');</script>";
}
?>
</body>
</html>
