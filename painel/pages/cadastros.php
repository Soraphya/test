<?php
Painel::verificaPermissaoPagina(0);
$clientes = Painel::listarTotal('tb_control.clientes');
$parceiros = Painel::listarTotal('tb_control.parceiros');

if (isset($_GET['excluir-cliente'])) {
    $idExcluir = intval($_GET['excluir-cliente']);
    $idCliente = Painel::selectSingle('tb_control.clientes', $idExcluir);
    Painel::delete('tb_control.clientes', $idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'cadastros');
}

if (isset($_GET['excluir-parceiro'])) {
    $idExcluir = intval($_GET['excluir-parceiro']);
    $idCliente = Painel::selectSingle('tb_control.parceiros', $idExcluir);
    Painel::delete('tb_control.parceiros', $idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'cadastros');
}

?>


<div class="painel-container">
    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-cliente" class="sub-menu">
        <i class="fa fa-user-o"></i>
        <h2>Cadastrar Clientes</h2>
    </a>
    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-parceiro" class="sub-menu">
        <i class="fa fa-star-o"></i>
        <h2>Cadastrar Parceiros</h2>
    </a>
    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-usuario" class="sub-menu">
        <i class="fa fa-user-circle"></i>
        <h2>Cadastrar Usuários</h2>
    </a>
</div>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-users"></i>
            <h2>Clientes Cadastrados</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $key => $cliente) { ?>

                        <tr>
                            <td><?php echo $cliente['empresa']; ?></td>
                            <td><a class="btn-edit" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-cliente?id=<?php echo $cliente['cupom_id']; ?>"><i class="options fa fa-pencil-square-o"></i></a></td>
                            <td><a actionBtn="delete" class="btn-delete" href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastros?excluir-cliente=<?php echo $cliente['id']; ?>"><i class="options fa fa-trash-o"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-share-alt"></i>
            <h2>Parceiros Cadastrados</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parceiros as $key => $parceiro) { ?>

                        <tr>
                            <td><?php echo $parceiro['nome']; ?></td>
                            <td><a class="btn-edit" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-parceiro?id=<?php echo $parceiro['id']; ?>"><i class="options fa fa-pencil-square-o"></i></a></td>
                            <td><a actionBtn="delete" class="btn-delete" href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastros?excluir-parceiro=<?php echo $parceiro['id']; ?>"><i class="options fa fa-trash-o"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>