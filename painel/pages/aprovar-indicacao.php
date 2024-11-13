<?php 
Painel::verificaPermissaoPagina(0); 
$indicacoes = Painel::listarTotal('tb_control.indicacoes');

if (isset($_GET['aprovar'])) {
    $idExcluir = intval($_GET['aprovar']);
    $idCliente = Painel::selectSingle('tb_control.indicacoes', $idExcluir);
    Painel::delete('tb_control.indicacoes', $idExcluir);
    Painel::redirect(INCLUDE_PATH_PAINEL . 'aprovar-indicacao');
}

?>

<div class="painel-container">
    <div class="box-home">
        <i class="fa fa-money" aria-hidden="true"></i>
        <h2 class="box-home-info">Total de indicações</h2>
        <p><?php echo count($indicacoes); ?></p>
    </div>
</div>

<div class="painel-container">
    <div class="box-content">
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Parceiro</th>
                        <th>Empresa</th>
                        <th>Visualizar Dados</th>
                        <th>Aprovar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($indicacoes as $key => $indicacao) { 
                        $parceiro = Painel::selectSingle('tb_control.parceiros',$indicacao['parceiro']);
                    ?>

                        <tr>
                            <td><?php echo $parceiro['nome']; ?></td>
                            <td><?php echo $indicacao['empresa']; ?></td>
                            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>dados-indicacao?id=<?php echo $indicacao['id']; ?>"><i class="fa fa-eye options"></i></a></td>
                            <td><a href="<?php echo INCLUDE_PATH_PAINEL ?>aprovar-indicacao?aprovar=<?php echo $indicacao['id']; ?>"><i class="fa fa-check-circle-o options"></i></a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>