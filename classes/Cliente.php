<?php

    class Cliente{

        
        public static function selectSingle($id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.clientes` WHERE `cupom_id` = ?");
            $sql->execute(array($id));
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);
            return $cliente;
        }

        public static function infoLogin($id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.clientes` WHERE `login_id` = ?");
            $sql->execute(array($id));
            $cliente = $sql->fetch(PDO::FETCH_ASSOC);
            return $cliente;
        }

        public static function cadastrarCliente($dados){

            $query = "INSERT INTO `tb_control.clientes` VALUES (NULL,";
            $arr = [];
            $date = date('Y-m-d');

            foreach($dados as $chave => $dado){
                if($chave == 'acao'){
                    continue;
                }

                if($dado == ''){
                    Painel::alert('erro','O Campo '. $chave. ' não foi preenchido');
                    return false;
                }

                if($chave == 'login_id'){
                    $query .= "?";
                }else{
                    $query .= "?,";
                }
                $arr[] = $dado;
            }

            $query.=",?,?,?,?)";
            $arr[] = $date;
            $arr[] = 'N';
            $arr[] = 'N';
            $arr[] = uniqid();

            
            // echo $query;
            // echo "<pre>";
            // print_r($dados);
            // echo "</pre>";

            $sql = MySql::conectar()->prepare($query);
            if($sql->execute($arr)){
                Painel::alert('sucesso','Cadastro realizado com sucesso');
            }else{
                Painel::alert('erro','Erro ao cadastraro cliente');
            }


        }

        public static function indicarCliente($dados){

           
            $parceiro = Parceiro::infoLogin($_SESSION['id'])['id'];

            $query = "INSERT INTO `tb_control.indicacoes` VALUES (NULL,";
            $arr = [];

            foreach($dados as $chave => $dado){
                if($chave == 'acao'){
                    continue;
                }

                if($dado == ''){
                    Painel::alert('erro','O Campo '. $chave. ' não foi preenchido');
                    return false;
                }

                if($chave == 'whatsapp'){
                    $query .= "?";
                }else{
                    $query .= "?,";
                }
                $arr[] = $dado;
            }

            $query.=",?)";
            $arr[] = $parceiro;

            
            // echo $query;
            // echo "<pre>";
            // print_r($arr);
            // echo "</pre>";

            $sql = MySql::conectar()->prepare($query);
            if($sql->execute($arr)){
                Painel::alert('sucesso','Cadastro realizado com sucesso');
            }else{
                Painel::alert('erro','Erro ao cadastraro cliente');
            }


        }



    }


?>