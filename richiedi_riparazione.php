<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Richiesta Riparazione</title>
<style>
body { font-family: Arial; background: #f8f8f8; display: flex; justify-content: center; align-items: center; height: 100vh; }
.form-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); width: 400px; }
.form-container { display: flex; flex-direction: column; gap: 10px; }
.input { padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
button { padding: 10px; background: #dc3545; color: white; border: none; border-radius: 5px; font-weight: bold; }
</style></head>
<body>
<div class="form-box">
  <form method="POST">
    <h2>Richiedi Riparazione</h2>
    <div class="form-container">
      <input class="input" type="number" name="id_drone" placeholder="ID Drono" required>
      <input class="input" type="date" name="data_ingresso" required>
      <input class="input" type="text" name="descrizione" placeholder="Descrizione problema" required>
      <input class="input" type="number" name="costo" placeholder="Costo previsto (€)" required>
    </div>
    <button type="submit" name="submit">Invia Richiesta</button>
  </form>
</div>
<?php
if(isset($_POST['submit'])){
  $stmt = $conn->prepare("INSERT INTO RIPARAZIONE (ID_Drone, DataIngresso, Descrizione, Stato, Costo) VALUES (?, ?, ?, 'In Corso', ?)");
  $stmt->bind_param("issd", $_POST['id_drone'], $_POST['data_ingresso'], $_POST['descrizione'], $_POST['costo']);
  $stmt->execute();
  echo "<script>alert('Riparazione registrata!');</script>";
}
?>
</body>
</html>