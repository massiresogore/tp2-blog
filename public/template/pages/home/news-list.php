
<main>
    <h1>List des actuallités de la plu récente à la plus ancienne</h1>
  
<div  id="news-containers">
    <?php  foreach ($newsDatas as $news) : ?>
                <a href="/news/view?id=<?= $news->getIdn() ?>" class="edit-btn"><?= $news->getTitle() ?></a>
    <?php endforeach; ?>
</div>



<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    main {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    #news-containers {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .edit-btn {
        display: block;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .edit-btn:hover {
        background-color: #0056b3;
    }
    
</style>
</main>




