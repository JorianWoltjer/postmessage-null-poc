<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['csrf'] = bin2hex(random_bytes(32));

  header('Location: /vuln.php');
  exit;
}
?>

<body>
  <h1>Login</h1>
  <p>Write a username to your session</p>
  <form action="/" method="post">
    <input type="text" name="username" placeholder="Username">
    <button type="submit">Submit</button>
  </form>
</body>