<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Servizio Fotografico</title>
<style>
body { font-family: Arial; background: #f8f8f8; display: flex; justify-content: center; align-items: center; height: 100vh; }
.form-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); width: 400px; }
.form-container { display: flex; flex-direction: column; gap: 10px; }
.input { padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
button { padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; font-weight: bold; }
</style></head>
<body>
<div class="form-box">
  <form method="POST">
    <h2>Richiesta Servizio Fotografico</h2>
    <div class="form-container">
      <input class="input" type="number" name="id_cliente" placeholder="ID Cliente" required>
      <input class="input" type="text" name="evento" placeholder="Tipo Evento" required>
      <input class="input" type="date" name="data_evento" required>
      <input class="input" type="text" name="luogo" placeholder="Luogo" required>
      <input class="input" type="number" name="prezzo" placeholder="Prezzo (€)" required>
    </div>
    <button type="submit" name="submit">Richiedi</button>
  </form>
</div>
<?php
if(isset($_POST['submit'])){
  $stmt = $conn->prepare("INSERT INTO SERVIZIO_FOTOGRAFICO (ID_Cliente, TipoEvento, DataEvento, Luogo, Prezzo) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("isssd", $_POST['id_cliente'], $_POST['evento'], $_POST['data_evento'], $_POST['luogo'], $_POST['prezzo']);
  $stmt->execute();
  echo "<script>alert('Servizio richiesto con successo!');</script>";
}
?>
</body>
</html>