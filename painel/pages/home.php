<?php 

    Painel::verificaPermissaoPagina(0);
    Financeiro::atualizaAtrasados();
    $visitasTotais = Painel::listaVisitasTotais(); 
    $chamadosAbertos = Suporte::listaChamados('A'); 
    $clientes = Painel::listarTotal('tb_control.clientes');
    $boletosAbertos = Financeiro::listarBoletosAbertos();


    if(isset($_GET['id'])){
        if(Financeiro::confirmarPagamento($_GET['id'])){
            $boletosAbertos = Financeiro::listarBoletosAbertos();
        }else{
            echo "TUDO ERRADO";
        }
        
    }

?>

<div class="painel-container">
    <div class="box-home">
        <i class="fa fa-user-o" aria-hidden="true"></i>
        <h2 class="box-home-info">Visitas Mês</h2>
        <p><?php echo count($visitasTotais); ?></p>
    </div>
    <div class="box-home">
        <i class="fa fa-users" aria-hidden="true"></i>
        <h2 class="box-home-info">Clientes</h2>
        <p><?php echo count($clientes); ?></p>
    </div>
    <div class="box-home">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
        <h2 class="box-home-info">Chamados</h2>
        <p><?php echo count($chamadosAbertos); ?></p>
    </div>
</div>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-money"></i>
            <h2>Últimas Faturas</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Valor</th>
                        <th>Vencimento</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($boletosAbertos as $key => $boleto){ 
                        $cliente = Painel::selectSingle('tb_control.clientes',$boleto['empresa_id']);
                    ?>


                        <tr>
                            <td><?php echo $cliente['empresa'];?></td>
                            <td><?php echo $boleto['valor'] ?></td>
                            <td><?php echo date('d/m/Y',strtotime($boleto['vencimento'])) ?></td>
                            <td>
                                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?id=<?php echo $boleto['id'];?>" class="tag-status <?php echo Financeiro::pegaCor($boleto['status']) ?>">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    <p>Pagar</p>
                                </a>
                            </td>
                        </tr>


                    <?php } ?> 
                </tbody>

                
            </table>
        </div>
    </div>
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-envelope-o"></i>
            <h2>Chamados em aberto</h2>
        </div>
        <div class="new-table">
            <table>
                <thead>
                    <tr>
                        <!-- <th>Categoria</th> -->
                        <th>Empresa</th>
                        <th>Data</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    foreach($chamadosAbertos as $key => $chamado){ 
                    $cliente = Painel::selectSingle('tb_admin.usuarios',$chamado['autor']);
                ?>


                    <tr>
                        <!-- <td><?php echo pegaCargo($chamado['categoria']);?></td> -->
                        <td><?php echo $cliente['nome'];?></td>
                        <td><?php echo date('d/m/Y',strtotime($chamado['data'])) ?></td>
                        <td>
                            <a 
                                href="<?php echo INCLUDE_PATH_PAINEL ?>suporte-aberto?id=<?php echo $chamado['id']?>" 
                                class="tag-status <?php echo Suporte::pegaCor($chamado['status']); ?>">
                                    <i class="fa fa-<?php echo Suporte::pegaIcone($chamado['status']); ?>" aria-hidden="true"></i>
                                    <p><?php echo Suporte::pegaStatus($chamado['status']); ?></p>
                            </a>
                        </td>
                    </tr>


                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
