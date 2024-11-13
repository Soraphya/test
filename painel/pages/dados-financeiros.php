<?php Painel::verificaPermissaoPagina(3); ?>
<?php 
    
    $id = $_GET['id'];
    $parceiro = Parceiro::selectSingle($id);
    $idParceiro = $parceiro['id'];
    $atrasados = Parceiro::listarEmpresasAtrasadas($idParceiro);
    $indicados = Parceiro::listarEmpresasIndicadas($idParceiro);
    $indicacoes = count($indicados);
   

    // echo "<pre>";
    // print_r($atrasados);
    // echo "</pre>";

?>

<div class="painel-container">
    <div class="box-content">
        <div class="content-title">
            <h2><?php echo $parceiro['nome']; ?> - Licença Atual</h2>
            <div class="nivel">
                <?php
                $stars = ($indicacoes % 5 == 0) ? 5 : ($indicacoes % 5);
                if ($indicacoes < 6) {
                    for ($i = 1; $i <= $indicacoes; $i++) {
                        echo '<i class="fa fa-star bronze"></i>';
                    }
                }else if ($indicacoes < 11) {
                    for ($i = 1; $i <= $stars; $i++) {
                        echo '<i class="fa fa-star prata"></i>';
                    }
                }else if ($indicacoes < 16) {
                    for ($i = 1; $i <= $stars; $i++) {
                        echo '<i class="fa fa-star ouro"></i>';
                    }
                }else if ($indicacoes < 21) {
                    for ($i = 1; $i <= $stars; $i++) {
                        echo '<i class="fa fa-star platina"></i>';
                    }
                }else if($indicacoes < 26){
                    for($i = 1;$i <= $stars;$i++){
                    echo '<i class="fa fa-diamond diamante"></i>';
                    }
                }else{
                    echo '<i class="fa fa-trophy master"></i>';
                }
                ?>
                <!-- <i class="fa fa-star bronze"></i>
                <i class="fa fa-star prata"></i>
                <i class="fa fa-star ouro"></i>
                <i class="fa fa-star platina"></i>
                <i class="fa fa-diamond diamante"></i>
                <i class="fa fa-trophy master"></i>  -->
            </div>
        </div>
    </div>
</div>

<div class="painel-container">
    <div class="box-home">
        <i class="fa fa-warning" aria-hidden="true"></i>
        <h2 class="box-home-info">títulos pendentes</h2>
        <p><?php echo count($atrasados); ?></p>
    </div>
    <div class="box-home">
        <i class="fa fa-share-alt" aria-hidden="true"></i>
        <h2 class="box-home-info">Total Indicações</h2>
        <p><?php echo $indicacoes; ?></p>
    </div>
    
</div>

<div class="painel-container">

<div class="box-content">
    <div class="table">
            <div class="table-title">
                <i class="fa fa-users"></i>
                <h2>Indicados</h2>
            </div>
            <div class="table-column">
                <p>#</p>
                <p>Empresa</p>
            </div>
            <?php foreach($indicados as $key => $indicado){ ?>
            <div class="table-row">
                <p>#<?php echo $key + 1 ?></p>
                <p><?php echo $indicado['empresa']; ?></p>
            </div>
            <?php } ?>

        </div>     
    </div>

    <div class="box-content">
        <div class="table">
            <div class="table-title">
                <i class="fa fa-share-alt"></i>
                <h2>Nivel Indicações</h2>
            </div>
            <div class="table-column">
                <p>Atual</p>
                <p>Status</p>
                <p>Próximo</p>
                <p>Valor</p>
            </div>
            <div class="table-row">
                <p><i class="fa fa-star bronze"></i></p>
                <p><?php echo (number_format($indicacoes / 6 * 100, 2)) < 100 ? (number_format($indicacoes / 6 * 100, 2)) : number_format(100, 2) ?>%</p>
                <p><i class="fa fa-star prata"></i></p>
                <p>$50</p>
            </div>
            <div class="table-row">
                <p><i class="fa fa-star prata"></i></p>
                <p><?php echo (number_format($indicacoes / 11 * 100, 2)) < 100 ? (number_format($indicacoes / 11 * 100, 2)) : number_format(100, 2) ?>%</p>
                <p><i class="fa fa-star ouro"></i></p>
                <p>$100</p>
            </div>
            <div class="table-row">
                <p><i class="fa fa-star ouro"></i></p>
                <p><?php echo (number_format($indicacoes / 16 * 100, 2)) < 100 ? (number_format($indicacoes / 16 * 100, 2)) : number_format(100, 2) ?>%</p>
                <p><i class="fa fa-star platina"></i></p>
                <p>$150</p>
            </div>
            <div class="table-row">
                <p><i class="fa fa-star platina"></i></p>
                <p><?php echo (number_format($indicacoes / 21 * 100, 2)) < 100 ? (number_format($indicacoes / 21 * 100, 2)) : number_format(100, 2) ?>%</p>
                <p><i class="fa fa-diamond diamante"></i></p>
                <p>$200</p>
            </div>
            <div class="table-row">
                <p><i class="fa fa-diamond diamante"></i></p>
                <p><?php echo (number_format($indicacoes / 26 * 100, 2)) < 100 ? (number_format($indicacoes / 26 * 100, 2)) : number_format(100, 2) ?>%</p>
                <p><i class="fa fa-trophy master"></i> </p>
                <p>$250</p>
            </div>

        </div>
    </div>
</div>