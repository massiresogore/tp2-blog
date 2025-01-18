<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav>
    <div class="logo">
        <a href="/">Logo</a>
    </div>
    <ul>
        <li><a href="/">News</a></li>
        <li><a href="/users/login">Login</a></li>
        <li><a href="/users/register">Register</a></li>
    </ul>
</nav>

<div class="flashMessage">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="session">
                <div class="flash-color visibilityVisible">
                    <div class='flash <?= isset($_SESSION['message']) ?  $_SESSION['message'] : "" ?>'> Mis a jour éffectuée</div>
                    <?php unset($_SESSION['message']); ?>
                </div>
            </div>
        <?php } ?>
    </div>



    {{content}}
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }
    nav {
        background-color: #333;
        color: white;
        padding: 10px;
    }
    .logo a {
        color: white;
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
    }
    ul {
        list-style-type: none;
        padding: 0;
    }
    ul li {
        display: inline;
        margin-right: 20px;
    }
    ul li a {
        color: white;
        text-decoration: none;
    }
    ul li a:hover {
        text-decoration: underline;
    }
    .flash-message {
        background-color: #4CAF50;
        font-size: 1.3rem;
        color: white;
        text-align: center;
        padding: 40px;
        margin-bottom: 10px;
        transition: display .5s ease-in-out;
    }






.flash-color {
  background: var(--background-black);
  visibility: hidden;
}

.flash {
  padding: 4rem;
  font-size: 2.6rem;
  color: #EEEEEE;
  background-color: #024959;
  text-align: center;
}

.session {
  background: var(--background-black);
}

.visibilityHidden {
  visibility: hidden;
}

.visibilityVisible {
  visibility: visible;
}

</style>
<!-- <script>
    setTimeout(() => {
        document.querySelector('.flash-message').style.display = 'none';
    }, 1500); -->
</script>
</body>
</html>