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
            <form action='questUpload.php' method="post" enctype="multipart/form-data">

                <!--
                        Quest obsahuje:

                        quest name
                        quest xp
                        quest reward - plain text
                        obrázek

                  -->

                <label for="name"> Název úkolu: </label> <br>
                <input type="text" name="name" id="name"> <br>


                <label for="description"> Popis úkolu: </label> <br>
                <textarea type="text" name="description" id="description"> </textarea> <br>


                <label for="xp"> Zkušenostní body za úkol: </label> <br>
                <input type="number" min="1" max="100000" name="xp" id="xp"> <br>


                <label for="reward"> Peníze za úkol: </label> <br>
                <input type="number" min="1" max="2000000" name="reward" id="reward"> <br>




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

</body>
</html>
