<?php

    class Usuario{

        public static function atualizarUsuario($nome,$user,$password){
            $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET `nome` = ? , `user` = ? , `password` = ? WHERE `id` = ?");
            if($sql->execute(array($nome,$user,$password,$_SESSION['id']))){
                return true;
            }else{
                return false;
            }
        }

        public static function usuarioExistente($user){
            $sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE `user` = ?");
            $sql->execute(array($user));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        public static function cadastrarUsuario($user,$password,$nome,$cargo){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?)");
            if($sql->execute(array($user,$password,$nome,$cargo))){
                Painel::alert('sucesso', 'Cadastro realizado com sucesso');
            }else{
                Painel::alert('erro', 'Contate o suporte!');
            }
        }

        public static function totalUsuarios(){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
            $sql->execute();
            $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }

        public static function totalUsuariosPorCargo($cargo){
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE `cargo` = ?");
            $sql->execute(array($cargo));
            $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }


     }
?>