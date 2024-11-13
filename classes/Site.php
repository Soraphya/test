<?php

    class Site{

        public static function updateUsuarioLogado(){
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $ultimaAcao = date('Y-m-d H:i:s');
                $check = MySql::conectar()->prepare('SELECT `id` from `tb_admin.online` WHERE token = ?');
                $check->execute(array($_SESSION['online']));

                if($check->rowCount() == 1){
                    $sql = MySql::conectar()->prepare('UPDATE `tb_admin.online` SET `ultima_atualizacao` = ? WHERE `token` = ?');
                    $sql->execute(array($ultimaAcao,$token));
                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $ultimaAcao = date('Y-m-d H:i:s');
                    $token = $_SESSION['online'];
                    $sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.online` VALUES (null,?,?,?)');
                    $sql->execute(array($ip,$ultimaAcao,$token));
                }
            }else{
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $ultimaAcao = date('Y-m-d H:i:s');
                $token = $_SESSION['online'];
                $sql = MySql::conectar()->prepare('INSERT INTO `tb_admin.online` VALUES (null,?,?,?)');
                $sql->execute(array($ip,$ultimaAcao,$token));
            }
        }

        public static function contador(){
            @setcookie('visita','true',time() - 1);
            if(!isset($_COOKIE['visita'])){
                @setcookie('visita','true',time() + (60*60*24*7));
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
                $sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
            }
        }

    }

?>