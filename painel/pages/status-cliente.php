<?php Painel::verificaPermissaoPagina(2); ?>
<?php 

    $id = $_GET['id'];
    $cliente = Cliente::selectSingle($id);
    $boletos = Financeiro::listarBoletosPorCliente($cliente['id']);
    



?>

<div class="painel-container">
    <div class="box-content">
        <div class="content-title">
            <h2>Status - <?php echo $cliente['empresa']; ?></h2>
        </div>
    </div>
</div>

<!-- <div class="painel-container">
    <div class="box-home">
        <i class="fa fa-money" aria-hidden="true"></i>
        <h2 class="box-home-info">Débito Total</h2>
        <p>---</p>
    </div>
    <div class="box-home">
        <i class="fa fa-money" aria-hidden="true"></i>
        <h2 class="box-home-info">Total Multa</h2>
        <p>---</p>
    </div>
</div> -->



<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-bar-chart"></i>
            <h2>Mensalidades</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Valor</th>
                        <!-- <th>Multa</th> -->
                        <th>Vencimento</th>
                        <th>Pagamento</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($boletos as $key => $boleto) { ?>

                        <tr>
                            <td>$<?php echo $boleto['valor']; ?></td>
                            <!-- <td>$<?php echo Financeiro::calcularMultaBoleto($boleto['id']); ?></td> -->
                            <td><?php echo date('d/m/Y',strtotime($boleto['vencimento'])) ?></td>
                            <td><?php echo ($boleto['pagamento'] == '0000-00-00') ? 'Em aberto' : date('d/m/Y',strtotime($boleto['pagamento'])) ?></td>
                            <td>
                                <a target="_blank" href="<?php echo $boleto['link'] ?>" class="tag-status <?php echo Financeiro::pegaCor($boleto['status']) ?>">
                                    <i class="fa fa-<?php echo Financeiro::pegaIcone($boleto['status']) ?>" aria-hidden="true"></i>
                                    <p><?php echo Financeiro::pegaStatus($boleto['status']) ?></p>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>