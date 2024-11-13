<?php 
include('config.php') ;
include('./classes/Site.php');
Site::contador();

// if( $_SERVER['SCRIPT_URI'] == 'http://soraphya.com/'){
//     Painel::redirect(INCLUDE_PATH);
// }

// echo '</pre>';
// print_r($_SERVER);
// echo '<pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Tags para SEO-->
    <meta name="description" content="Auxiliamos empresas com serviços de tecnologia, mídia, marketing e mais.">
    <meta name="keywords" content="websites, homepage, criação de sites, desenvolvimento de sites, internet, SEO, construção de sites, comércio eletrônico, shopping virtual, webdesign, manutenção, recife, pernambuco, marketing digital, redes sociais, e-commerce">
    <meta name="author" content="Leonardo Anthony">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soraphya</title>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/style.css">
    <script>

        

    </script>
</head>

<body>
    <?php
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    $classLine = '';

    if ($url == 'tech') {
        $classLine = "line-red";
    } else
    if ($url == 'marketing') {
        $classLine = 'line-orange';
    } else
    if ($url == 'midia') {
        $classLine = 'line-green';
    } else {
        $classLine = 'line-purple';
    }



    ?>

    <header class="header-site  <?php echo $classLine; ?>">
        <div class="container">
            <div class="flex">
                <a href="<?php echo INCLUDE_PATH; ?>">
                    <div class="logo">
                        <img src="painel/upload/logo-white.png" alt="">
                        <p>Soraphya</p>
                    </div>
                </a>
                <nav class="nav-desktop">
                    <ul>
                        <li class="dropdown js-menu-dropdown">
                            <p>Serviços</p>
                            <i class="fa fa-angle-down js-icon-rotate"></i>
                        </li>
                        <div class="drop-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col33">
                                        <a href="<?php echo INCLUDE_PATH; ?>tech">
                                            <div class="service-title tech-hover">
                                                <i class="fa fa-desktop"></i>
                                                <div>
                                                    <h3>Tech</h3>
                                                    <p>Sites Personalizados</p>
                                                    <p>e-Commerce</p>
                                                    <p>Agendamentos</p>
                                                    <p>Ordem de Serviço</p>
                                                    <p>Imobiliárias</p>
                                                </div>
                                            </div>
                                        </a>


                                    </div>
                                    <div class="col33">
                                        <a href="<?php echo INCLUDE_PATH; ?>marketing">
                                            <div class="service-title marketing-hover">
                                                <i class="fa fa-bullhorn"></i>
                                                <div>
                                                    <h3>Marketing</h3>
                                                    <p>Gestão de Redes Sociais</p>
                                                    <p>Gestão de Tráfego</p>
                                                    <p>Registro de Marca</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- <div class="service-title">
                                            <i class="fa fa-address-card-o"></i>
                                            <div>
                                                <h3>Identidade Visual</h3>
                                                <p>Logomarcas</p>
                                                <p>Panfletos</p>
                                                <p>Cartões de Visita</p>
                                                <p>Bordados</p>
                                                <p>Mockups</p>

                                            </div>
                                        </div> -->

                                    </div>
                                    <div class="col33">
                                        <a href="<?php echo INCLUDE_PATH; ?>midia">
                                            <div class="service-title midia-hover">
                                                <i class="fa fa-file-image-o"></i>
                                                <div>
                                                    <h3>Mídia</h3>
                                                    <p>Fotos Profissionais</p>
                                                    <p>Vídeos comerciais</p>
                                                    <p>Campanhas Publiciárias</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!--<a href="<?php echo INCLUDE_PATH; ?>galeria">
                                        <div class="service-title">
                                            <i class="fa fa-table"></i>
                                            <div>
                                                <h3>Galeria</h3>
                                                <p>Veja alguns dos nossos projetos, e imagine tendo o seu aqui!</p>
                                            </div>
                                        </div>
                                        </a> -->
                                    </div>
                                </div>

                            </div>
                        </div>

                        <li class="dropdown js-menu-dropdown">
                            <p>Sobre</p>
                            <i class="fa fa-angle-down js-icon-rotate"></i>
                        </li>
                        <div class="drop-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col33">
                                        <a href="<?php echo INCLUDE_PATH; ?>sobre">
                                            <div class="service-title">
                                                <i class="fa fa-id-badge"></i>
                                                <div>
                                                    <h3>Quem somos</h3>
                                                    <p>Um pouco da nossa história, visão e as pessoas que fazem tudo isso ser real</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col33">
                                        <!-- <div class="service-title">
                                            <i class="fa fa-comments-o"></i>
                                            <div>
                                                <h3>Depoimentos</h3>
                                                <p>Descubra porque esses líderes adoram os produtos Soraphya</p>
                                            </div>
                                        </div> -->
                                        <a href="<?php echo INCLUDE_PATH; ?>parceiro">
                                            <div class="service-title">
                                                <i class="fa fa-star-o"></i>
                                                <div>
                                                    <h3>Seja nosso parceiro</h3>
                                                    <p>Você sabe como ajudar pessoas e empresas? Então entre e vamos tomar um café</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo INCLUDE_PATH; ?>contato">
                            <li>Contato</li>
                        </a>
                    </ul>
                </nav>
                <i class="fa fa-bars js-btn-mobile"></i>
                <nav class="nav-mobile">
                    <ul>
                        <li class="dropdown js-menu-dropdown">
                            <p>Serviços</p>
                            <i class="fa fa-angle-down js-icon-rotate"></i>
                        </li>
                        <div class="drop-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col33">
                                        <div class="service-title">
                                            <i class="fa fa-desktop"></i>
                                            <div>
                                                <a href="<?php echo INCLUDE_PATH; ?>tech">
                                                    <h3>Tech</h3>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col33">
                                        <div class="service-title">
                                            <i class="fa fa-bullhorn"></i>
                                            <div>
                                                <a href="<?php echo INCLUDE_PATH; ?>marketing">
                                                    <h3>Marketing</h3>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- <div class="service-title">
                                            <i class="fa fa-address-card-o"></i>
                                            <div>
                                                <h3>Identidade Visual</h3>

                                            </div>
                                        </div> -->
                                        <div class="service-title">
                                            <i class="fa fa-file-image-o"></i>
                                            <a href="<?php echo INCLUDE_PATH; ?>midia">
                                                <h3>Mídia</h3>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col33">
                                        <!-- <div class="service-title">
                                            <i class="fa fa-table"></i>
                                            <div>
                                                <h3>Galeria</h3>
                                                <p>Veja alguns dos nossos projetos, algum deles pode ser seu!</p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>

                        <li class="dropdown js-menu-dropdown">
                            <p>Sobre</p>
                            <i class="fa fa-angle-down js-icon-rotate"></i>
                        </li>
                        <div class="drop-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col33">
                                        <a href="<?php echo INCLUDE_PATH; ?>sobre">
                                            <div class="service-title">
                                                <i class="fa fa-id-badge"></i>
                                                <div>
                                                    <h3>Quem somos</h3>
                                                    <p>Um pouco da nossa história, visão e as pessoas que fazem tudo isso ser real</p>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <div class="col33">
                                        <!-- <div class="service-title">
                                            <i class="fa fa-comments-o"></i>
                                            <div>
                                                <h3>Depoimentos</h3>
                                                <p>Descubra porque esses líderes adoram os produtos Soraphya</p>
                                            </div>
                                        </div> -->
                                        <a href="<?php echo INCLUDE_PATH; ?>parceiro">
                                        <div class="service-title">
                                            <i class="fa fa-star-o"></i>
                                            <div>
                                                <h3>Seja nosso parceiro</h3>
                                                <p>Você sabe como ajudar pessoas e empresas? Então entre e vamos tomar um café</p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo INCLUDE_PATH; ?>contato">
                            <li>Contato</li>
                        </a>
                        <div class="overlay"></div>
                    </ul>
                    
                </nav>
            </div>
        </div>
    </header>




    <?php




    if (file_exists('pages/' . $url . '.php')) {
        include('pages/' . $url . '.php');
    } else {
        if ($url != 'marketing') {
            $pagina404 = true;
            include('pages/404.php');
        } else {
            include 'pages/home.php';
        }
    }


    ?>

    <footer class="footer-site">
        <div class="container">
            <div class="row">
                <div class="col50 copy">
                    <p>Todos os direitos reservados - Soraphya</p>
                </div>
                <div class="col50">
                    <div class="social-media">
                        <p>Contate-nos</p>
                        <a href="https://api.whatsapp.com/send?phone=5581999932991&text=Ol%C3%A1%2C%20gostaria%20de%20conhecer%20a%20*Soraphya%20Technology*"><i class="fa fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com/soraphya/"><i class="fa fa-instagram"></i></a>
                        <a href="mailto:contato@soraphya.com"><i class="fa fa-envelope-o"></i></a>
                        <a href="tel:5581999932991"><i class="fa fa-phone"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script type="module" src="<?php echo INCLUDE_PATH ?>js/script.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.ajaxform.js"></script>
    <script>
        $(function() {

            $('.form-contato').submit(function() {

                if (formularioPreenchido()) {
                    var form = $('.form-contato');
                    $('.form-contato').ajaxSubmit({
                        beforeSubmit: function() {
                            form.find('input[type=submit]').attr('disabled', 'true');
                            form.find('input[type=submit]').animate({
                                'opacity': '0.4'
                            })
                            form.find('input[type=submit]').attr('value', 'Carregando');

                        },
                        success: function(data) {
                            //Aqui você pode inserir uma div, por exemplo.
                            //Qualquer mensagem de sucesso, após o formulario ter sido enviado.
                            alert('Formulário foi enviado com sucesso!');
                            form.find('input[type=submit]').removeAttr('disabled');
                            form.find('input[type=submit]').animate({
                                'opacity': '1'
                            })
                            form.find('input[type=submit]').attr('value', 'Enviar');
                            form[0].reset();
                        }
                    });
                } else {
                    alert("Campos Vázios não são permitidos!");
                }



                return false;
            })

            function formularioPreenchido() {
                var nome = $('[name=nome]').val();
                var email = $('[name=email]').val();
                var texto = $('[name=mensagem]').val();
                if (nome === '' || email === '' || texto === '') {
                    return false;
                } else {
                    return true;
                }
            }


        })
    </script>
</body>

</html>