
<?php var_dump($newsToUpdate) ?>

<main>
    <div style="max-width: 700px; margin: 0 auto;">
        <h1>Ajouter d'actualité</h1>

        <!-- atribut  	idn	title	content	author	date	image	-->

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" value="<?= $newsToUpdate->getTitle()?? "" ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content"  class="form-control"><?= $newsToUpdate->getContent()?? "" ?></textarea>
            </div>
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" name="author" value="<?= $newsToUpdate->getAuthor()?? "" ?>" id="author" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div> -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Image Preview" style="display:none; margin-top:10px; width:100px; height:100px; border:1px solid #ccc; border-radius:4px;">
            </div>
            <script>
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
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</main>
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
