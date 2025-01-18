
<main>


    <h1>List des actuallités</h1>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        main {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #news-containers {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .news-item {
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            width: calc(36.333% - 20px);
            box-sizing: border-box;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .news-item h2 {
            font-size: 1.5em;
            color: #333;
        }

        .news-item p {
            color: #666;
            line-height: 1.6;
        }

        .news-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        .actions {
            margin-top: 10px;
        }
        .actions a {
                    display: inline-block;
                    padding: 10px 15px;
                    border-radius: 5px;
                    background-color: #007BFF;
                    color: #fff;
                    text-decoration: none;
                    transition: background-color 0.3s ease;
                }

                .actions a:hover {
                    background-color: #0056b3;
                }

                .actions .edit-btn {
                    background-color: #28a745;
                }

                .actions .edit-btn:hover {
                    background-color: #218838;
                }

                .actions .delete-btn {
                    background-color: #dc3545;
                }

                .actions .delete-btn:hover {
                    background-color: #c82333;
                }

    </style>
<div  id="news-containers">
    <?php  foreach ($newsDatas as $news) : ?>
        <div class="news-item">
            <h2><?= $news->getTitle(); ?></h2>
            <p><?= $news->getContent(); ?></p>
            <p><strong>Author:</strong> <?= $news->getAuthor(); ?></p>
            <p><strong>Date:</strong> <?= $news->getDate(); ?></p>
            <img src="<?="../../../images/".$news->getImage(); ?>" alt="News Image">
            <img src="../../../images/" alt="">
            <div class="actions">
                <a href="/news/edit/<?= $news->getIdn() ?>" class="edit-btn">Edit</a>
                <a href="/news/delete/<?= $news->getIdn() ?>" class="delete-btn">Delete</a>
                <a href="/news/add" class="delete-btn">Ajouter des news</a>
            </div>
            <style>
               
            </style>
        </div>
    <?php endforeach; ?>
</div>


  
</main>




