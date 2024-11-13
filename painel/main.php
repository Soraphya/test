<?php

if (isset($_GET['loggout'])) {
    Painel::loggout();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;700;800&display=swap" rel="stylesheet">


</head>

<body class="main">
    <section class="menu menu-desktop container">
        <nav >
            <ul>
                <div class="menu-suporte" <?php Painel::verificaPermissaoMenu(0);  ?>>
                    <li <?php Painel::menuSelecionado('');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-server " aria-hidden="true"></i>Início</a>
                    </li>
                    <li <?php Painel::menuSelecionado('cadastros');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastros"> <i class="fa fa-user-plus" aria-hidden="true"></i>Cadastros</a>
                    </li>
                    <li <?php Painel::menuSelecionado('financeiro');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>financeiro"> <i class="fa fa-usd" aria-hidden="true"></i>Financeiro</a>
                    </li>
                    <li <?php Painel::menuSelecionado('administrativo');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>administrativo"> <i class="fa fa-university" aria-hidden="true"></i>ADM</a>
                    </li>
                    <li <?php Painel::menuSelecionado('suporte');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>suporte"><i class="fa fa-wrench" aria-hidden="true"></i>Suporte</a>
                    </li>
                    <li <?php Painel::menuSelecionado('relatorio');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>relatorio"><i class="fa fa-file-text-o" aria-hidden="true"></i>Relatórios</a>
                    </li>
                </div>
                <div class="menu-cliente" <?php Painel::verificaPermissaoMenu(2);  ?>>
                    <?php if (isset($_SESSION['cupom_id'])){ ?>
                    <li <?php Painel::menuSelecionado('status-cliente'); ?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>status-cliente?id=<?php echo $_SESSION['cupom_id']; ?>"><i class="fa fa-server" aria-hidden="true"></i>Painel</a>
                    </li>
                    <li <?php Painel::menuSelecionado('dados-cliente'); ?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>dados-cliente"><i class="fa fa-address-card-o" aria-hidden="true"></i>Dados</a>
                    </li>
                    
                    <li <?php Painel::menuSelecionado('abrir-chamado');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>abrir-chamado"><i class="fa fa-wrench" aria-hidden="true"></i>Abrir Chamado</a>
                    </li>
                    <?php } ?>
                </div>
                <div class="menu-parceiro" <?php Painel::verificaPermissaoMenu(3);  ?>>
                    <?php if (isset($_SESSION['cupom_id'])){ ?>
                    <li <?php Painel::menuSelecionado('dados-financeiros'); ?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>dados-financeiros?id=<?php echo $_SESSION['cupom_id']; ?>"><i class="fa fa-server" aria-hidden="true"></i>Painel</a>
                    </li>
                    <li <?php Painel::menuSelecionado('indicar-cliente'); ?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>indicar-cliente"><i class="fa fa-user-plus" aria-hidden="true"></i>Indicar Cliente</a>
                    </li>
                    
                    <li <?php Painel::menuSelecionado('abrir-chamado');?>>
                        <a href="<?php echo INCLUDE_PATH_PAINEL ?>abrir-chamado"><i class="fa fa-wrench" aria-hidden="true"></i>Abrir chamado</a>
                    </li>
                    <?php } ?>
                </div>
                
                
                
                <li>
                    <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
                </li>
            </ul>
        </nav>
    </section>

    <section class="menu-mobile js-menu-mobile">
        <nav >
        <ul>
                <li <?php Painel::menuSelecionado('');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fa fa-server " aria-hidden="true"></i>Início</a>
                </li>
                <!-- <li <?php Painel::menuSelecionado('dados');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>dados"><i class="fa fa-address-card-o" aria-hidden="true"></i>Dados</a>
                </li> -->
                <li <?php Painel::menuSelecionado('cadastros');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastros"> <i class="fa fa-user-plus" aria-hidden="true"></i>Cadastros</a>
                </li>
                <li <?php Painel::menuSelecionado('financeiro');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>financeiro"> <i class="fa fa-usd" aria-hidden="true"></i>Financeiro</a>
                </li>
                <li <?php Painel::menuSelecionado('administrativo');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>administrativo"> <i class="fa fa-university" aria-hidden="true"></i>ADM</a>
                </li>
                <li <?php Painel::menuSelecionado('suporte');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>suporte"><i class="fa fa-wrench" aria-hidden="true"></i>Suporte</a>
                </li>
                <li <?php Painel::menuSelecionado('suporte');?>>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>relatorio"><i class="fa fa-file-text-o" aria-hidden="true"></i>Relatórios</a>
                </li>
                <li>
                    <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</a>
                </li>
            </ul>
        </nav>
    </section>

    <section class="menu-top container">
        <div class="logomarca">
            <img class="logo" src="images/logo.svg" alt="">
            <p class="marca">Soraphya Technology</p>
        </div>
        <span class="js-btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </section>

    <section class="main-content">
        <?php Painel::loadPage(); ?>
    </section>

    

    
    <script type="module" src="<?php echo INCLUDE_PATH_PAINEL; ?>js/script.js"></script>
</body>

</html>