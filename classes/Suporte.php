<?php 

class Suporte{

    public static $status = [
        'A' => 'Aberto',
        'F' => 'Fechado',
        'R' => 'Resposta'
    ];

    public static $tagColor = [
        'A' => 'red',
        'F' => 'green',
        'R' => 'purple'
    ];

    public static $tagIcon = [
        'A' => 'times',
        'F' => 'check',
        'R' => 'plus'
    ];

    public static function pegaStatus($indice){
        return Suporte::$status[$indice];
    }

    public static function pegaCor($indice){
        return Suporte::$tagColor[$indice];
    }

    public static function pegaIcone($indice){
        return Suporte::$tagIcon[$indice];
    }

    

    public static function insertSuport($titulo,$mensagem){
        $date = date('Y-m-d');
        $categoria = $_SESSION['cargo'];
        $autor = $_SESSION['id'];

        $sql = MySql::conectar()->prepare("INSERT INTO `tb_control.suporte` VALUES (null,?,?,?,?,?,?)");
        if($sql->execute(array($titulo,$mensagem,$date,$categoria,$autor,'A'))){
            Painel::alert('sucesso','Mensagem Enviada com Sucesso');
        }else{
            Painel::alert('erro','Mensagem não enviada');
        }

        
    }

    public static function listaChamados($status){
        if($status){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.suporte` WHERE `status` = ?");
            $sql->execute(array($status));
            $chamados = $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.suporte`");
            $sql->execute();
            $chamados = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $chamados;
    }

    public static function listaResposta($suporteId){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.respostas` WHERE `suporte_id` = ?");
        $sql->execute(array($suporteId));
        $respostas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respostas;
    }

    public static function alteraChamado($status,$id){
        $sql = MySql::conectar()->prepare("UPDATE `tb_control.suporte` SET `status` = ? WHERE `id` = ?");
        if($sql->execute(array($status,$id))){
            return true;
        }else{
            return false;
        }
    }

    public static function responder($mensagem,$remetente,$suporteId){
        $date = date('Y-m-d');
        $sql = MySql::conectar()->prepare("INSERT INTO `tb_control.respostas` VALUES (null,?,?,?,?)");
        if($sql->execute(array($suporteId,$remetente,$mensagem,$date))){
            self::alteraChamado('R',$suporteId);
            Painel::alert('sucesso','Mensagem Enviada com Sucesso');
        }else{
            Painel::alert('erro','Mensagem não enviada');
        }
    }

    public static function listaChamadoPorUsuario($usuario){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_control.suporte` WHERE `autor` = ?");
        if($sql->execute(array($usuario))){
            $chamados = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $chamados;
        }else{
            Painel::alert('erro','Erro ao listar chamados por usuário');
        }

    }




}


?>