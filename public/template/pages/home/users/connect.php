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
        <h1>Connexion </h1>

        <!-- atribut  	idn	title	content	author	date	image	-->
        <?php if(isset($_SESSION['Authmessage'])): ?>
            <div style="color:red;">
                <?= $_SESSION['Authmessage'] ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" >
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email"  id="email"  value="<?= isset($_SESSION['dataSaveByIncorrect'])  ? $_SESSION['dataSaveByIncorrect']["email"] : "" ?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" name="pwd"  id="pwd" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</main>
