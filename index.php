<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sklep z babeczkami</title>
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body>
    <header class="header">
      <div class="header-img"></div>
      <h1 class="header-logo">SWEET</h1>
      <h2 class="header-text">CUPCAKES</h2>
      <nav class="header-nav">
        <ul class="header-nav-list">
          <li class="header-nav-list-item">
            <img
              class="header-nav-list-item-img"
              src="img/pngegg (10).png"
              alt="ikona strony głównej"
            />
            <a href="index.html" target="_blank" rel="noopener noreferrer"
              >Home</a
            >
          </li>
          <li class="header-nav-list-item">
            <img
              class="header-nav-list-item-img"
              src="img/pngegg (7).png"
              alt="ikona strony głównej"
            />
            <a
              href="http://localhost/skleptest"
              target="_blank"
              rel="noopener noreferrer"
              >GalerIa</a
            >
          </li>
          <li class="header-nav-list-item">
            <img
              class="header-nav-list-item-img"
              src="img/pngegg (8).png"
              alt="ikona strony głównej"
            />

            <a href="http://localhost/skleptest" target="_blank" rel="noopener noreferrer"
              >Sklep</a
            >
          </li>
          <li class="header-nav-list-item">
            <img
              class="header-nav-list-item-img"
              src="img/pngegg (11).png"
              alt="ikona strony głównej"
            />
            <a href="http://localhost/skleptest" target="_blank" rel="noopener noreferrer">Blog</a>
          </li>
          <li class="header-nav-list-item">
            <img
              class="header-nav-list-item-img"
              src="img/pngegg (9).png"
              alt="ikona strony głównej"
            />
            <a href="kontakt.html" target="_blank" rel="noopener noreferrer"
              >Kontakt</a
            >
          </li>
        </ul>
      </nav>
    </header>
    
<section class="login">
  <H1>Sklep internetowy</H1>
    <div class="login__panel">
        <h2>Zaloguj się</h2>
        <form action="login.php" method="post">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login">Zaloguj się</button>
        </form>
    </div>
    <div class="panel">
        <h2>Zarejestruj sie</h2>
        <form action="register.php" method="post">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required>

            

            
            

            

            <button type="submit" >Zarejestruj</button>
        </form>
        
    </div>
    </section>
    <footer class="footer">
      <h2 class="footer-logo">Masz Pytania? Skontaktuj się z nami</h2>
      <a class="contact" href="mailto:email.gmail.com"
        >Email: email@gmail.com</a
      >

      <a class="contact" href="tel:+48123456789">Zadzwoń +48 123456789</a>
    </footer>
    
  </body>
</html>
