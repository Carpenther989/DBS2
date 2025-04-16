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
  <div class="modal fade" id="modal_addAnime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5">Správa anime</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form class="row g-3" id="anime_form">
                      <div class="col-md-12">
                          <label for="input_name" class="form-label">Název</label>
                          <input type="text" class="form-control" id="input_name" name="name">
                      </div>
                      <div class="col-md-6">
                          <label for="input_seasons" class="form-label">Počet sezón</label>
                          <input type="number" class="form-control" id="input_seasons" name="seasons">
                      </div>
                      <div class="col-6">
                          <label for="input_episodes" class="form-label">Počet epizod per sezónu</label>
                          <input type="number" class="form-control" id="input_episodes" name="episodes">
                      </div>
                      <div class="col-12">
                          <label for="input_description">Popis</label>
                          <textarea class="form-control" name="description" id="input_description"></textarea>
                      </div>
                      <div class="col-12">
                          <button type="submit" class="btn btn-outline-primary">Přidat anime</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
      <header>
          <nav class="header-top">
              <div id="brand">
                  <button type="button" id="logo" class="btn btn-light" data-dl-toggle>
                      <i class="fa fa-sun"></i>
                  </button>

              </div>
              <div id="menu">
                  <ul>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="imagePage.php">Nahrát Obrázek</a></li>
                      <li><a href="#quests">Questy</a></li>
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
              <!--<?php  echo "RANDOM SHIT"; ?> -->
              <p>Lorem ipsum in dolor center</p>
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
            <ul>
                <li><a href="#">Debut</a></li>
                <li><a href="#">Checking</a></li>
                <li><a href="#">Shootout Picnic</a></li>
                <li><a href="#">Delivery from the Past</a></li>
                <li><a href="#">Bad Rep Evidence</a></li>
                <li><a href="#">Ice Cream Cones</a></li>
                <li><a href="#">Postman Pat - Part 1</a></li>
                <li><a href="#">Shaking up the Teller</a></li>
                <li><a href="#">The Punisher - Part 1</a></li>
                <li><a href="#">The Punisher - Part 2</a></li>
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function ()
            {
                loadAnimeFromStorage();
                if (getCookie('userName') !== null)
                {
                    updateMenu();
                    buttonVisibility();
                }
            }
        );

        document.getElementById('search').addEventListener('keyup', function()
            {
                filterAnime(this.value);
            }
        );
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/userRecognition.js"></script>
    <script src="js/documentListener.js"></script>
    <script src="js/formListener.js"></script>
  </body>
</html>
