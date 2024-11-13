<?php

if (isset($_COOKIE['lembrar'])) {
    $user = $_COOKIE['user'];
    $password = $_COOKIE['password'];

    $sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.usuarios` where `user` = ? and `password` = ?');
    $sql->execute(array($user, $password));
    if ($sql->rowCount() == 1) {
        $info = $sql->fetch();
        $_SESSION['id'] = $info['id'];
        $_SESSION['login'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['nome'] = $info['nome'];
        $_SESSION['cargo'] = $info['cargo'];
        $_SESSION['img'] = $info['img'];
        header('Location: ' . INCLUDE_PATH_PAINEL);
        die();
    }
}   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Soraphya</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.13.0/devicon.min.css">
</head>
<body>

    
    
    <div class="login-container">
        <?php
        
        if(isset($_POST['acao'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            

            $sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.usuarios` where `user` = ? and `password` = ?');
            $sql->execute(array($user,$password));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                $_SESSION['id'] = $info['id'];
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                $_SESSION['nome'] = $info['nome'];
                $_SESSION['cargo'] = $info['cargo'];
                if(isset($_POST['lembrar'])){
                    setcookie('lembrar','true',time()+(60*60*24),'/');
                    setcookie('user',$user,time()+(60*60*24),'/');
                    setcookie('password',$password,time()+(60*60*24),'/');
                }
                if($info['cargo'] == 3){
                    $parceiro = Parceiro::infoLogin($info['id']);
                    $_SESSION['cupom_id'] = $parceiro['cupom_id'];
                    header('Location: '.INCLUDE_PATH_PAINEL.'dados-financeiros?id='.$_SESSION['cupom_id']);
                }else if($info['cargo'] == 2){
                    $cliente = Cliente::infoLogin($info['id']);
                    $_SESSION['cupom_id'] = $cliente['cupom_id'];
                    header('Location: '.INCLUDE_PATH_PAINEL.'status-cliente?id='.$_SESSION['cupom_id']);
                } else
                    header('Location: '.INCLUDE_PATH_PAINEL);
                die();
            } else{
                echo '<div class="erro-box erro-animacao"> <i class="material-icons">highlight_off</i> <p>  Usuário ou senha incorretos</p> </div>';
            }
        }

    ?>
        <div class="box-login">
            <img src="images/logo.svg" alt="logo.svg ">
            
            <form method="post">
                <h2>Painel de Controle</h2>
                <input type="text" name="user" required placeholder="Login">
                <input type="password" name="password" required placeholder="Senha">
                <div class="form-group-flex">
                    <div class="form-group-login">
                        <input type="submit" value="Entrar" name="acao">
                    </div>
                    <div class="form-group-login">
                        <label for="lembrar">Lembrar-me</label>
                        <input type="checkbox" name="lembrar" id="">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="modules" src="<?php echo INCLUDE_PATH_PAINEL?>js/script.js"></script>
</body>
</html>