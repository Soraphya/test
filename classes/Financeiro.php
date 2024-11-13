<?php

    class Financeiro{

        public static $status = [
            'O' => 'Aberto',
            'P' => 'Pago',
            'A' => 'Atraso'
        ];
    
        public static $tagColor = [
            'O' => 'green',
            'P' => 'purple',
            'A' => 'red'
        ];
    
        public static $tagIcon = [
            'O' => 'plus',
            'P' => 'check',
            'A' => 'times'
        ];

        public static function pegaStatus($indice){
            return self::$status[$indice];
        }
    
        public static function pegaCor($indice){
            return self::$tagColor[$indice];
        }
    
        public static function pegaIcone($indice){
            return self::$tagIcon[$indice];
        }

        public static function listarBoletosAbertos(){
            $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_control.financeiro` WHERE `status` != ?");
            $sql->execute(array('P'));
            $boletos = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $boletos;
            
        }

        public static function listarBoletosPorCliente($id){
            $sql = Mysql::conectar()->prepare("SELECT * FROM `tb_control.financeiro` WHERE `empresa_id` = ?");
            $sql->execute(array($id));
            $boletos = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $boletos;
            
        }

        public static function confirmarPagamento($id){
            $hoje = date('Y-m-d');
            $sql = MySql::conectar()->prepare("UPDATE `tb_control.financeiro` SET `status` = ?, `pagamento` = ? WHERE `id` = ? ");
            if($sql->execute(array('P',$hoje,$id)))
                return true;
            else
                return false;

        }

        public static function cadastrarBoletos($dados){
            $query = "INSERT INTO `tb_control.financeiro` VALUES (NULL,";
            $arr = [];
            $date = date('Y-m-d');

            foreach($dados as $chave => $dado){
                if($chave == 'acao'){
                    continue;
                }

                if($dado == ''){
                    Painel::alert('erro','O Campo '. $chave. ' não foi preenchido');
                }

                if($chave == 'link'){
                    $query .= "?";
                }else{
                    $query .= "?,";
                }
                $arr[] = $dado;
            }

            $query.=",?,?)";
            $arr[] = 'O';
            $arr[] = '';

            
            

            $sql = MySql::conectar()->prepare($query);
            if($sql->execute($arr)){
                Painel::alert('sucesso','Cadastro realizado com sucesso');
            }else{
                Painel::alert('erro','Erro ao cadastraro boleto');
            }
        }

        public static function alteraStatus($status,$id){
            $sql = MySql::conectar()->prepare("UPDATE `tb_control.financeiro` SET `status` = ? WHERE `id` = ?");
            if($sql->execute(array($status,$id))){
                return true;
            }else{
                return false;
            }
        }

        public static function listaBoletos($status = null){
            if($status){
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.financeiro` WHERE `status` = ?");
                $sql->execute(array($status));
                $boletos = $sql->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.financeiro`");
                $sql->execute();
                $boletos = $sql->fetchAll(PDO::FETCH_ASSOC);
            }
            return $boletos;
        }

        public static function atualizaAtrasados(){

            $hoje = date('Y-m-d');

            $boletos = MySql::conectar()->prepare("SELECT * FROM `tb_control.financeiro`");
            $boletos->execute();
            $boletos = $boletos->fetchAll(PDO::FETCH_ASSOC);

            foreach($boletos as $chave => $boleto){
                if($boleto['status'] == 'P'){
                    continue;
                }
                if($boleto['vencimento'] < $hoje){
                    self::alteraStatus('A',$boleto['id']);
                }
            }

            return true;
        }

        public static function calcularMultaBoleto($idBoleto){
            
            $boleto = Painel::selectSingle('tb_control.financeiro',$idBoleto);        
            $multaPorAtraso = 1.5;
            $multa = 0;
            $hoje = new DateTime(date('Y-m-d'));
            $vencimento = new DateTime($boleto['vencimento']);
            $diasDeAtraso = $hoje->diff($vencimento);
            $diasDeAtraso = $diasDeAtraso->days;
            $hoje = date('Y-m-d');
            
            if($boleto['vencimento'] < $hoje){
                $multa = $multaPorAtraso + $diasDeAtraso;
            }else{
                $multa = 0;
            }

            return $multa;


        }


    }


?>