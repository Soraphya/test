<?php Painel::verificaPermissaoPagina(0); ?>
<?php 

$id = $_GET['id'];
$usuarioAtual = Painel::selectSingle('tb_admin.usuarios',$id); 

?>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-database"></i>
            <h2>Sistemas</h2>
        </div>
    </div>
</div>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-pencil"></i>
            <h2>Editar Usuário</h2>
        </div>
        <?php

    if (isset($_POST['acao'])) {

        $nome = $_POST['nome'];
        $user = $_POST['user'];
        $password = $_POST['password'];

        if(Usuario::usuarioExistente($user) && $user != $usuarioAtual['user']){
            Painel::alert('erro','Usuário já cadastrado');
        }else{
            if (Usuario::atualizarUsuario($nome, $user, $password)) {
                Painel::alert('sucesso', 'Atualizado com sucesso');
                $usuarioAtual = Painel::selectSingle('tb_admin.usuarios',$id);
            } else {
                Painel::alert('erro', 'Ocorreu um erro');
            }
        }
    }

    ?>



    <form class="form-suporte" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required value="<?php echo $usuarioAtual['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="user">Usuário:</label>
            <input type="text" name="user" required value="<?php echo $usuarioAtual['user']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" name="password" required value="<?php echo $usuarioAtual['password']; ?>">
        </div>
        <div class="form-group">
            <input class="green" type="submit" name="acao" value="Atualizar!">
        </div>
    </form>
    </div>  

    

</div>


