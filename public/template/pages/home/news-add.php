<main>
    <style>
        .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
            }

            .form-control {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-top: 10px;
                cursor: pointer;
                border-radius: 4px;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }
    </style>
    <div style="max-width: 700px; margin: 0 auto;">
        <h1>Ajouter d'actualité</h1>

        <!-- atribut  	idn	title	content	author	date	image	-->

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="<?= isset($_GET['id']) ? $newsToUpdate->getTitle() : "" ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content"  class="form-control"><?=isset($_GET['id']) ?  $newsToUpdate->getContent(): "" ?></textarea>
            </div>
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" name="author" value="<?=isset($_GET['id']) ?  $newsToUpdate->getAuthor() : "" ?>" id="author" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Image Preview" style="display:none; margin-top:10px; width:100px; height:100px; border:1px solid #ccc; border-radius:4px;">
                <input id="imageForUpdateName" type="hidden" name="image" value="<?= isset($_GET['id']) ?  $newsToUpdate->getImage() : "" ?>">
            </div>
           
            <button type="submit" class="btn btn-primary"><?= isset($_GET['id'])  ? "mettre ajour": "ajouter" ?></button>
        </form>
    </div>
</main>

<script>
                const imageForUpdateName = document.getElementById('imageForUpdateName').value;
                const path ="../../../images/";

                if (imageForUpdateName !== "") {
                    document.getElementById('imagePreview').src = path + <?= json_encode(isset($_GET['id'])  ? $newsToUpdate->getImage() : " ") ?>;
                    document.getElementById('imagePreview').style.display = 'block';
                }
                function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                        var output = document.getElementById('imagePreview');
                        output.src = reader.result;
                        output.style.display = 'block';
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>