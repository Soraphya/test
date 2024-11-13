<?php

    class Parceiro{

        public static function selectSingle($id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.parceiros` WHERE `cupom_id` = ?");
            $sql->execute(array($id));
            $parceiro = $sql->fetch(PDO::FETCH_ASSOC);
            return $parceiro;
        }

        public static function infoLogin($id){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.parceiros` WHERE `login_id` = ?");
            $sql->execute(array($id));
            $parceiro = $sql->fetch(PDO::FETCH_ASSOC);
            return $parceiro;
        }

        

        public static function cadastrarParceiro($dados){

            $query = "INSERT INTO `tb_control.parceiros` VALUES (NULL,";
            $arr = [];

            if($dados['login_id'] == 100){
                Painel::alert('erro','Selecione um login válido');
                return false;
            }

            foreach($dados as $chave => $dado){
                if($chave == 'acao'){
                    continue;
                }

                if($dado == ''){
                    Painel::alert('erro','O Campo '. $chave. ' não foi preenchido');
                }

                

                if($chave == 'login_id'){
                    $query .= "?";
                }else{
                    $query .= "?,";
                }
                $arr[] = $dado;
            }

            $query.=",?,?)";
            $arr[] = uniqid();
            $arr[] = 'N';
            

            // echo "<pre>";
            // print_r($dados);
            // echo "</pre>";

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

        public static function listarEmpresasIndicadas($parceiroId){
            $empresas = MySql::conectar()->prepare("SELECT * FROM `tb_control.clientes` where `parceiro` = ?");
            $empresas->execute(array($parceiroId));
            $empresas = $empresas->fetchAll(PDO::FETCH_ASSOC);
            return $empresas;
            
        }

        public static function listarEmpresasAtrasadas($parceiroId){
            $indicados = self::listarEmpresasIndicadas($parceiroId);
            $atrasados = [];
            
            foreach($indicados as $chave => $indicado){
                $boletos = MySql::conectar()->prepare("SELECT * FROM `tb_control.financeiro` WHERE `empresa_id` = ? AND `status` != ?");
                $boletos->execute(array($indicado['id'],'P'));
                $boletos = $boletos->fetchAll(PDO::FETCH_ASSOC);
                $atrasados = array_merge($atrasados,$boletos);
            }

            // echo "<pre>";
            // print_r($indicados);
            // echo "</pre>";

            // echo "<pre>";
            // print_r($atrasados);
            // echo "</pre>";

            return $atrasados;
        }


    }


?>