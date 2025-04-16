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
                <li><a href="questSubmit.php">Nahrát Úkol</a></li>
                <li><a href="index.php#quests">Úkoly</a></li>
                <li><a href="login.php" data-login>Přihlásit se</a></li>
                <li><a href="register.php" data-login>Zaregistrovat se</a></li>
            </ul>
        </div>
    </nav>
</header>


<div class="clearfix"><br></div>
<div class="main">
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

    <div class="content">
        <h2>Nahrát Úkol</h2>

        <div class='odstavec'>
            <form action='questUpload.php'>
                <br><br>
                <label class='custom-file-upload'>
                    Vybrat soubor
                    <input type='file' accept='image/*' name='image' onchange='previewImage(event)'>
                </label>
                <img id='image-preview' alt='Image preview' style='display: none; max-width: 300px; margin-top: 15px;'>
                <br>
                <input type='submit' value='Nahrát' id='submit'>
            </form>
        </div>


    </div>
</div>
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/userRecognition.js"></script>
<script src="js/documentListener.js"></script>
<script src="js/formListener.js"></script>
</body>
</html>
