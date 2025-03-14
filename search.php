<?php session_start(); ?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Pencarian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container text-center mt-5">
    <h1>Hasil Pencarian</h1>
    <p id="result"></p>
    <a href="index2.php" class="btn btn-primary">Kembali ke Index</a>
  </div>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const query = urlParams.get('query');
    document.getElementById('result').textContent = query ? 'Anda mencari: ' + query : 'Menampilkan pencarian yang dilakukan.';
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


