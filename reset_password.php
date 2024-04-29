<?php
session_start();

if (!isset($_SESSION['username'])) {
  http_response_code(403);
  die('Not logged in');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['csrf'] !== $_SESSION['csrf']) {
    http_response_code(403);
    die('Invalid CSRF token');
  }

  // Reset password
  echo 'Password for <b>' . htmlspecialchars($_SESSION['username']) . '</b> has been set to <b>' . htmlspecialchars($_POST['new_password']) . '</b>';
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
  exit;
}
