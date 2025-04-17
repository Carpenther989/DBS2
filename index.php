<!DOCTYPE html>
<html lang="cs" data-bs-theme="dark">
  <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Tarkov Wiki</title>
      <link rel="stylesheet" href="css/main.css"/>
      <link rel="stylesheet" href="css/bootstrap.min.css"/>
      <link rel="stylesheet" href="fonts/6.0/css/all.min.css"/>

      <script src="js/cookieManager.js"></script>
  </head>
  <body>

      <header>
          <nav class="header-top">
              <div id="brand">

                  <i class="fa fa-sun"></i>


              </div>
              <div id="menu">
                  <ul>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="questSubmit.php">Nahrát Úkol</a></li>
                      <li><a href="index.php#quests">Úkoly</a></li>
                      <li><a href="login.php" data-login>Přihlásit se</a></li>
                      <li><a href="register.php" data-login>Zaregistrovat se</a></li>
                  </ul>
              </div>
          </nav>
      </header>

      <div class="hero" id="section00">
          <div class="overlay"></div>
          <div class="hero-content">
              <h1>Tarkov Wiki - Vaše Tarkovská wikipedie...</h1>

          </div>
      </div>
    <div class="clearfix"><br></div>
    <div class="main" id="quests">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Questy</li>
            </ol>
        </nav>
        <div class="clearfix"><br></div>
        <div class="align-content-center">
            <div class="mb-3">
                <label for="search" class="form-label">Vyhledávání</label>
                <input type="text" class="form-control" id="search" placeholder="Zadejte název questu">
            </div>
        </div>
        <div class="clearfix"><br></div>

        <div class="clearfix"><br></div>

        <div class="list">

            <h3>Seznam Úkolů</h3>

            <ul>

<?php

global $conn;
require_once('dbsConnect.php');
$sql = 'SELECT * from questyjmena';
foreach ($conn->query($sql) as $row) {
    print '<li> <a href="content.php?questname='.$row['name'].'">'.$row['name'] . " </a></li>";

}


?>

            </ul>
        </div>
    </div>


  </body>
</html>
