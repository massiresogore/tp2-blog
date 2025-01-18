
    <h2>Registration Form</h2>
<style>
    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>


   <!-- array(1) { ["dataSaveByIncorrect"]=> array(6) { ["lastname"]=> string(6) "sogore" ["firstname"]=> string(7) "massire" ["email"]=> string(21) "massire.org@gmail.com" ["confirm_email"]=> string(21) "massire.org@gmail.com" ["pwd"]=> string(1) "k" ["confirm_pwd"]=> string(1) "h" } }-->

 

    <form action="" method="post">
        <?php if(isset($_SESSION['Authmessage'])): ?>
            <div style="color:red;">
                <?= $_SESSION['Authmessage'] ?>
            </div>
        <?php endif; ?>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?= isset($_SESSION['dataSaveByIncorrect'])  ? $_SESSION['dataSaveByIncorrect']["lastname"] : "" ?>" required><br><br>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"  value="<?= isset($_SESSION['dataSaveByIncorrect'])  ? $_SESSION['dataSaveByIncorrect']["firstname"] : "" ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  value="<?= isset($_SESSION['dataSaveByIncorrect'])  ? $_SESSION['dataSaveByIncorrect']["email"] : "" ?>" required><br><br>

        <label for="confirm_email">Confirm Email:</label>
        <input type="email" id="confirm_email" name="confirm_email"  value="<?= isset($_SESSION['dataSaveByIncorrect'])  ? $_SESSION['dataSaveByIncorrect']["confirm_email"] : "" ?>" required><br><br>

        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd" required><br><br>

        <label for="confirm_pwd">Confirm Password:</label>
        <input type="password" id="confirm_pwd" name="confirm_pwd" required><br><br>

        <input type="submit" value="Register">
    </form>

    <?php 
    if(isset($_SESSION['Authmessage'])) unset($_SESSION['Authmessage']);
    if(isset($_SESSION['dataSaveByIncorrect'])) unset($_SESSION['dataSaveByIncorrect']); ?>
