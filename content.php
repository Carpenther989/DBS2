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
        <?php
        global $conn;
        require_once('dbsConnect.php');
        $questname = $_GET['questname'];
        echo '<h1>'.$questname.'</h1> <br>';
        echo '<br>';
        $stmt = $conn->prepare("SELECT quest.questname AS 'name',
 descr.descText AS 'popis',
 quest.xp_earned AS 'xp',
 quest.money_earned AS 'moni'
 ,quest.preview_image AS 'img' 
FROM  quest INNER JOIN descr ON quest.description_id=descr.id 
WHERE quest.questname=:qwest;");
        $stmt->bindParam(':qwest', $questname);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<img src="data:image/jpeg;base64,'.base64_encode($result['img']).'"/><br>';
        echo 'popis :<br>';
        echo $result['popis'];
        echo '<br>';
        echo 'xp : '.$result['xp'].'<br>';
        echo 'finančí odměna : '.$result['moni'].' rublů blyat';

        ?>
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
