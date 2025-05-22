<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>DroneTech - Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }

    .dashboard {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 50px;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      text-align: center;
      width: 500px;
    }

    h1 {
      font-size: 32px;
      margin-bottom: 30px;
      color: #fff;
    }

    .btn-container {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .btn-container a {
      text-decoration: none;
      padding: 14px 25px;
      background-color: #00BFFF;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      transition: 0.3s ease-in-out;
    }

    .btn-container a:hover {
      background-color: #0099cc;
    }
    .codepen-button {
  font-family: monospace;
  font-weight: bolder;
  display: block;
  cursor: pointer;
  color: #000;
  margin: 20px auto;
  position: relative;
  text-decoration: none;
  font-weight: 600;
  border-radius: 6px;
  overflow: hidden;
  padding: 3px;
  width: 130px;
  isolation: isolate;
  transform: scale(0.85);
}

.codepen-button::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 420%;
  height: 120%;
  background: linear-gradient(
    115deg,
    #628fbc,
    hsl(0, 93%, 73%),
    #f032a7,
    #329af0,
    #f032a7
  );
  background-size: 25% 100%;
  animation: border-animation 0.75s linear infinite;
  animation-play-state: paused;
  translate: -5% 0%;
  transition: translate 0.25s ease-out;
}

.codepen-button:hover::before {
  animation-play-state: running;
  transition-duration: 0.75s;
  translate: 0% 0%;
}

@keyframes border-animation {
  to {
    transform: translateX(-100%);
  }
}

.codepen-button span {
  position: relative;
  display: block;
  padding: 1rem 1.5rem;
  font-size: 1.1rem;
  background: #fff;
  border-radius: 10px;
  height: 100%;
}

.codepen-button .span {
  display: flex;
  flex-direction: row;
  justify-content: start;
  align-items: center;
  gap: 50px;
}

.codepen-button .p {
  margin: 0;
  color: black;
}

  </style>
</head>
<body>
  <div class="dashboard">
    <h1>DroneTech - Pannello di Controllo</h1>
    <div class="btn-container">
      <a href="corso_prenota.php">🎓 Prenota Corso</a>
      <a href="acquista_drono.php">💰 Acquista Droni</a>
      <a href="visualizza_clienti.php">📋 Visualizza Clienti</a>
      <a href="visualizza_corsi.php">📘 Visualizza Corsi</a>
      <a href="richiedi_foto.php">📷 Servizio Fotografico</a>
      <a href="richiedi_riparazione.php">🔧 Richiedi Riparazione</a>
<a class="codepen-button" href="carrello.php">
  <span class="span">
    <p class="p">Shop</p>
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="#000" class="cart">
      <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 
        152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 
        24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 
        54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 
        464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 
        48 0 1 1 0-96z"/>
    </svg>
  </span>
</a>

    
    </div>
  </div>
</body>
</html>