<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Prenota Corso</title>
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
    <span class="title">Prenotazione Corso</span>
    <span class="subtitle">Inserisci i dati per prenotare.</span>
    <div class="form-container">
      <input type="number" class="input" name="id_cliente" placeholder="ID Cliente" required>
      <input type="number" class="input" name="id_corso" placeholder="ID Corso" required>
    </div>
    <button type="submit" name="submit">Prenota</button>
  </form>
  <div class="form-section">
    <p><a href="index.html">Torna alla Home</a></p>
  </div>
</div>

<?php
if(isset($_POST['submit'])){
  $stmt = $conn->prepare("INSERT INTO PRENOTAZIONE (ID_Cliente, ID_Corso) VALUES (?, ?)");
  $stmt->bind_param("ii", $_POST['id_cliente'], $_POST['id_corso']);
  $stmt->execute();
  echo "<script>alert('Prenotazione confermata!');</script>";
}
?>
</body>
</html>
