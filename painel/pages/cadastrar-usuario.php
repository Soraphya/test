<?php 

Painel::verificaPermissaoPagina(0); 
$usuarios = Usuario::totalUsuarios();

if (isset($_GET['excluir-usuario'])) {
    $idExcluir = intval($_GET['excluir-usuario']);
    $idCliente = Painel::selectSingle('tb_admin.usuarios', $idExcluir);
    Painel::delete('tb_admin.usuarios', $idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'cadastrar-usuario');
}


?>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-user-plus"></i>
            <h2>Cadastrar Usuário</h2>
        </div>
        <?php

        if (isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $cargo = $_POST['cargo'];

            if (!$nome) {
                Painel::alert('erro', 'Campo Nome vazio');
            } else if (!$user) {
                Painel::alert('erro', 'Campo Usuário vazio');
            } else if (!$password) {
                Painel::alert('erro', 'Campo Senha vázio');
            } else if ($cargo == 100) {
                Painel::alert('erro', 'Preencha um cargo válido');
            } else if (Usuario::usuarioExistente($user)) {
                Painel::alert('erro', 'Usuário ' . $user . ' já existe');
            } else {
                Usuario::cadastrarUsuario($user, $password, $nome, $cargo);
                Painel::redirect(INCLUDE_PATH_PAINEL . 'cadastrar-usuario');
            }
        }

        ?>

        <form class="form-suporte" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome">
            </div>
            <div class="form-group">
                <label for="user">Usuário:</label>
                <input type="text" name="user">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <select name="cargo">
                    <option selected value="100">Selecione um cargo</option>
                    <?php

                    foreach (Painel::$cargos as $key => $cargo) {
                        echo '<option value="' . $key . '">' . $cargo . '</option>';
                    }

                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <input class="green" type="submit" name="acao" value="Cadastrar!">
            </div>
        </form>
    </div>
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-users"></i>
            <h2>Usuários Cadastrados</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $key => $usuario) { ?>

                        <tr>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><a class="btn-edit" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuario?id=<?php echo $usuario['id']; ?>"><i class="options fa fa-pencil-square-o"></i></a></td>
                            <td><a actionBtn="delete" class="btn-delete" href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-usuario?excluir-usuario=<?php echo $usuario['id']; ?>"><i class="options fa fa-trash-o"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>