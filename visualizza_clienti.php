<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Clienti Registrati</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 40px; text-align: center; }
    h1 { color: #333; }
    table { margin: 20px auto; border-collapse: collapse; width: 80%; background: white; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    th, td { padding: 12px 15px; border-bottom: 1px solid #ddd; }
    th { background: #007BFF; color: white; }
    tr:hover { background: #f1f1f1; }
  </style>
</head>
<body>
  <h1>Clienti Registrati</h1>
  <table>
    <tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Email</th><th>Telefono</th><th>Tipo</th></tr>
    <?php
    $result = $conn->query("SELECT ID, Nome, Cognome, Email, Telefono, Tipo FROM CLIENTE");
    while($row = $result->fetch_assoc()){
      echo "<tr>
        <td>{$row['ID']}</td><td>{$row['Nome']}</td><td>{$row['Cognome']}</td>
        <td>{$row['Email']}</td><td>{$row['Telefono']}</td><td>{$row['Tipo']}</td>
      </tr>";
    }
    ?>
  </table>
</body>
</html>