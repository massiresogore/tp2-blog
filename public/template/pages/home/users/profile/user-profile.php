<main>
    <!-- on cree une page profile, avec des attribut, email, pwd, firstname, et lastname, avec bouton delete, update et supprimer -->

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

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
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            color: #fff;
          
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-primary {
            background-color:rgb(1, 100, 206);
        }
        .btn-primary:hover {
            background-color:rgb(0, 123, 255);
        }

       
        .btn-secondary {
            background-color: #b30000;
        }
        .btn-secondary:hover {
            background-color:rgb(255, 0, 0);
        }
       
        .btn-tertiary {
            background-color:rgb(54, 179, 0);
        }
        .btn-tertiary:hover {
            color: black;
            background-color:rgb(111, 255, 0);
        }





    </style>
 <div class="flashMessage">
        <?php if (isset($_SESSION['Authmessage'])) { ?>
            <div class="session">
                <div class="flash-color visibilityVisible">
                    <div class='flash <?= isset($_SESSION['Authmessage']) ?  $_SESSION['Authmessage'] : "" ?>'> Mis a jour éffectuée</div>
                    <?php unset($_SESSION['Authmessage']); ?>
                </div>
            </div>
        <?php } ?>
    </div>


    <div style="max-width: 700px; margin: 0 auto;">
        <h1>Profile </h1>
        <form action="" method="post">
               <!-- atribut  	idn	title	content	author	date	image	-->
        
        <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" value="<?= isset($_SESSION['user'])  ? $_SESSION['user']->getFirstname() : "" ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" value="<?= isset($_SESSION['user'])  ? $_SESSION['user']->getLastname() : "" ?>" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="email">Nouvel Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <label for="confirm_email">Confirm Email</label>
                <input type="email" name="confirm_email" id="confirm_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="pwd">Nouveau Password</label>
                <input type="password" name="pwd" id="pwd"  class="form-control">

                <label for="confirm_pwd">Confirm Password</label>
                <input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control">
            </div> -->
           
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/users/profile/delete" class="btn btn-secondary">Delete</a>
            <a href="/users/profile/update/advance" class="btn btn-tertiary">Advance modification</a>
        </form>
    </div>


</main>
