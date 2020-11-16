<?php
    include 'header.php';
?>

    <div class="login">
        <div class="form">
            <form method="post">
            <h2>Zaloguj się:</h2>
                 <br> <input type="text" name="email" placeholder="Email..."> <br> <br> 
                <input type="password" name="password" placeholder="Haslo..."> <br> <br> <br> 
                <button type="submit" class="form-btn" name="login">Zaloguj</button> <br> <br> 
            </form> 
        </div>
    </div>

<?php
    if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $sth = $db->prepare('SELECT * FROM uzytkownicy WHERE email=:email limit 1');
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        if($user){
            if(password_verify($password,$user['haslo'])){
                die("<h3>Uzytkownik zalogowany pomyslnie</h3>");
                }else{
                    echo "<h3>Nieprawidlowe haslo</h3>";
                }
            }else{
                echo "<h3>Nie znaleziono uzytkownika</h3>";
            }
        }
?>

    <div class="register">
        <div class="form">
            <form method="post">
            <h2>Zarejestruj sie:</h2>
                 <br> <input type="text" name="imie" placeholder="Imie..."> <br> <br> 
                <input type="text" name="nazwisko" placeholder="Nazwisko..."> <br> <br> 
                <input type="text" name="email" placeholder="Email..."> <br> <br> 
                <input type="password" name="password" placeholder="Haslo..."> <br> <br> <br> 
                <button type="submit" class="form-btn" name="register">Zarejestruj</button> <br> <br> 
            </form>
        </div>
    </div>

<?php
    if(isset($_POST['register'])){
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);
        $sth = $db->prepare('INSERT INTO uzytkownicy (imie,nazwisko,email,haslo) VALUE (:imie,:nazwisko,:email,:password)');
        $sth->bindValue(':imie', $imie, PDO::PARAM_STR);
        $sth->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $sth->execute();
    }
?>

<?php
    include 'footer.php';
?>