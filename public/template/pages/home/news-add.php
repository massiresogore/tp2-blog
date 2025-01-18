<main>
    <h1>Ajouter d'actualité</h1>

    <!-- atribut  	idn	title	content	author	date	image	-->


    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>
        <div class="form-group
        ">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="form-control">
        </div>
<div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

</main>

