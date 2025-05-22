<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Carrello - Droni acquistati</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    form {
      text-align: center;
      margin-bottom: 30px;
    }

    input[type="number"] {
      padding: 10px;
      width: 200px;
      margin: 0 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 10px 20px;
      background: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background: #0056b3;
    }

    table {
      margin: auto;
      border-collapse: collapse;
      width: 80%;
      background: white;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #007BFF;
      color: white;
    }
  </style>
</head>
<body>

<h2>Visualizza il tuo Carrello</h2>

<form method="GET">
  <label for="id_cliente">Inserisci il tuo ID Cliente:</label>
  <input type="number" name="id_cliente" required>
  <button type="submit">Visualizza</button>
</form>

<?php
if (isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "
    SELECT O.ID AS OrdineID, D.Modello, D.Marca, O.Data
    FROM ORDINE O
    JOIN DRONE D ON O.ID_Drone = D.ID
    WHERE O.ID_Cliente = ?
    ORDER BY O.Data DESC
  ";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id_cliente);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "<table>
      <tr><th>ID Ordine</th><th>Modello</th><th>Marca</th><th>Data</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
        <td>{$row['OrdineID']}</td>
        <td>{$row['Modello']}</td>
        <td>{$row['Marca']}</td>
        <td>{$row['Data']}</td>
      </tr>";
    }
    echo "</table>";
  } else {
    echo "<p style='text-align:center;'>Nessun drone acquistato trovato per questo ID cliente.</p>";
  }
}
?>

</body>
</html>
