<?php

    class Painel{

        public static $cargos = [
            '0' => 'ADMINISTRADOR',
            '1' => 'SUPORTE',
            '2' => 'CLIENTE',
            '3' => 'PARCEIRO'
        ];

        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
            setcookie('lembrar','true',time()-1,'/');
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
        }

        public static function loadPage(){
            if(isset($_GET['url'])){
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                }else{
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            }else{
                include('pages/home.php');
            }
        }

        public static function listarUsuariosOnline(){
            self::limparUsuariosOnline();
            $sql = MySql::conectar()->prepare('SELECT * FROM `tb_admin.online`');
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function limparUsuariosOnline(){
            $date = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE `ultima_atualizacao` < '$date' - INTERVAL 1 MINUTE");
        }

        public static function listaVisitasTotais(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function listaVisitasHoje(){
            $date = date("Y-m-d");
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE `data_visita` = '$date'");
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function alert($tipo,$mensagem){
            if($tipo == 'sucesso'){
                echo '<div class="box-alert sucesso"><i class="fa fa-check"></i><p>'.$mensagem.'</p></div>';
            }else if($tipo == 'erro'){
                echo '<div class="box-alert erro"><i class="fa fa-times"></i><p>'.$mensagem.'</p></div>';
            }
        }


        // * NEW PROJECT 


        public static function validaImagem($imagem){
            if($imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'image/jpg' ||
                $imagem['type'] == 'image/png'){
                return true;
            }else{
                return false;
            }
        }

        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $nomeArquivo = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/upload/'.$nomeArquivo)){
                return $nomeArquivo;
            }else{
                return false;
            }
        }

        public static function deletefile($file){
            @unlink(BASE_DIR_PAINEL.'/upload/'.$file);
        }

        public static function menuSelecionado($menu){
            echo 'class="menu-active"';
        }
        

        public static function verificaPermissaoMenu($permissao){
            if($_SESSION['cargo'] == $permissao || $_SESSION['cargo'] == 0){
                return;
            }else{
                echo 'style="display:none"';
            }
        }

        public static function verificaPermissaoPagina($permissao){
            if($_SESSION['cargo'] <= $permissao){
                return;
            }else{
                self::alert('erro','Permissão negada a página '.@$_GET['url']); 
                die();
            }
        }

        public static function listarTotal($tabela){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");            
            $sql->execute();
            return $sql->fetchAll();
        }


        public static function insertSingle($post){
            $nome_tabela = $post['nome_tabela'];
            $query = "INSERT INTO `$nome_tabela` VALUES (null";
            foreach($post as $key => $input){

                if($key == 'acao' || $key == 'nome_tabela'){
                    continue;
                }
                if($input == ''){
                    return false;
                    break;
                }
                $query.=",?";
                $parametros[] = $input;
            }

            $query.=")";

            $sql = MySql::conectar()->prepare($query);
            $sql->execute($parametros);
            
            $lastId = MySql::conectar()->lastInsertId();
            $orderid = MySql::conectar()->prepare("UPDATE `$nome_tabela` SET `order_id` = ? WHERE `id` = $lastId");
            $orderid->execute(array($lastId));

            return true;

        }

        public static function listarTabela($tabela,$inicio = null,$quantidade = null){

            if($inicio == null && $quantidade == null){
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY `order_id`");
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY `order_id` LIMIT $inicio,$quantidade");
            }

            
            $sql->execute();
            return $sql->fetchAll();
        }

        public static function delete($tabela,$id=false){
            if($id == false){
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
            }else{
                $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
            }
            $sql->execute();
        }

        public static function redirect($url){
            echo '<script>location.href="'.$url.'"</script>';
            die();

        }

        public static function selectSingle($tabela,$id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE id = $id");
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }

        public static function update($post){
            $nome_tabela = $post['nome_tabela'];
            $first = true;
            $query = "UPDATE `$nome_tabela` SET ";
            foreach($post as $chave => $conteudo){

                if($chave == 'acao' || $chave == 'nome_tabela' || $chave == 'id'){
                    continue;
                }

                if($conteudo == ''){
                    return false;
                    break;
                }
                
                if($first){
                    $first = false;
                    $query.="$chave=?";
                }else{
                    $query.=", $chave=?";
                }
                
                
                $parametros[] = $conteudo;

            }

            $query.= " WHERE id = ?";
            $parametros[] = $post['id']; 


            // $sql = MySql::conectar()->prepare($query);
            // $sql->execute($parametros);

            echo $query;
            echo "<pre>";
            print_r($post);
            echo "</pre>";

            return true;
        }

        public static function ordemItem($tabela,$order,$id){
            if($order == 'up'){

                $objetoAtual = Painel::selectSingle($tabela,$id);
                $posicaoAtual = $objetoAtual['order_id'];
                $objetoAcima = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE `order_id` < $posicaoAtual ORDER BY `order_id` DESC LIMIT 1");
                $objetoAcima->execute();
                if($objetoAcima->rowCount() == 0)
                    return;
                $objetoAcima = $objetoAcima->fetch();
                Painel::update(array(
                    'nome_tabela'=>$tabela,
                    'id'=>$objetoAcima['id'],
                    'order_id'=>$objetoAtual['order_id']
                ));
                Painel::update(array(
                    'nome_tabela'=>$tabela,
                    'id'=>$objetoAtual['id'],
                    'order_id'=>$objetoAcima['order_id']
                ));
            }else if($order == 'down'){

                $objetoAtual = Painel::selectSingle($tabela,$id);
                $posicaoAtual = $objetoAtual['order_id'];
                $objetoAcima = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE `order_id` > $posicaoAtual ORDER BY `order_id` ASC LIMIT 1");
                $objetoAcima->execute();
                if($objetoAcima->rowCount() == 0)
                    return;
                $objetoAcima = $objetoAcima->fetch();
                Painel::update(array(
                    'nome_tabela'=>$tabela,
                    'id'=>$objetoAcima['id'],
                    'order_id'=>$objetoAtual['order_id']
                ));
                Painel::update(array(
                    'nome_tabela'=>$tabela,
                    'id'=>$objetoAtual['id'],
                    'order_id'=>$objetoAcima['order_id']
                ));
            }


        }



    }
    

?>