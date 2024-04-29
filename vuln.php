<?php
session_start();

if (!isset($_SESSION['username'])) {
  http_response_code(403);
  die('Not logged in');
}
?>

<body>
  <h1>Vulnerable postMessage handler</h1>
  <p>Includes CSRF token to leak</p>
  <p>Username: <b><?= htmlspecialchars($_SESSION['username']); ?></b></p>
  <button onclick="location='/logout.php'">Logout</button>
  <form action="#">
    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf']; ?>">
  </form>
  <script>
    onmessage = (e) => {
      if (e.origin !== window.origin) return;
      eval(e.data);
    }
  </script>
</body>