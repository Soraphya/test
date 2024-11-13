<?php Painel::verificaPermissaoPagina(0); ?>
<?php

$parceiros = Painel::listarTotal('tb_control.parceiros');
$atrasados = Financeiro::listaBoletos('A');
$clientes = Painel::listarTotal('tb_control.clientes');


?>

<div class="painel-container">
    <div class="box-home">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <h2 class="box-home-info">Clientes Atrasados</h2>
        <p><?php echo count($atrasados); ?></p>
    </div>
    <div class="box-home">
        <i class="fa fa-money" aria-hidden="true"></i>
        <h2 class="box-home-info">Parceiros a pagar</h2>
        <p>---</p>
    </div>
    <div class="box-home">
        <i class="fa fa-users" aria-hidden="true"></i>
        <h2 class="box-home-info">Parceiros</h2>
        <p><?php echo count($parceiros); ?></p>
    </div>
</div>

<div class="painel-container">
    <a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-boleto" class="sub-menu">
        <i class="fa fa-money"></i>
        <h2>Cadastrar boleto</h2>
    </a>
    
</div>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-share-alt"></i>
            <h2>Status Cliente</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $key => $cliente) { ?>

                        <tr>
                            <td><?php echo $cliente['empresa']; ?></td>
                            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>status-cliente?id=<?php echo $cliente['cupom_id']; ?>"><i class="fa fa-eye options"></i></a></td>
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
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parceiros as $key => $parceiro) { ?>

                        <tr>
                            <td><?php echo $parceiro['nome']; ?></td>
                            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>dados-financeiros?id=<?php echo $parceiro['cupom_id']; ?>"><i class="fa fa-eye options"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>