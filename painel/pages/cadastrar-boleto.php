<?php Painel::verificaPermissaoPagina(0); ?>

<section class="painel-container">
    <div class="box-content">
    <?php 

        $clientes = Painel::listarTotal('tb_control.clientes');


        if(isset($_POST['acao'])){
            Financeiro::cadastrarBoletos($_POST);
        }

    ?>
        <div class="table-title">
                <i class="fa fa-money"></i>
                <h2>Cadastrar Boleto</h2>
        </div>
        
        <form class="form-dados" method="post">
            <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="empresa_id">Cliente:</label>
                <select name="empresa_id" id="">
                    <?php foreach($clientes as $chave => $value){ ?>
                    
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['empresa']; ?> - Dia: <?php echo $value['vencimento_dia'] ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" name="valor"  value="<?php echo @$_POST['valor']; ?>"/>
            </div>
            <div class="form-group">
                <label for="vencimento">Vencimento:</label>
                <input type="date" name="vencimento"  value="<?php echo @$_POST['vencimento']; ?>"/>
            </div>
            
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" name="link"  value="<?php echo @$_POST['link']; ?>"/>
            </div>
            



            <h3></h3>
            <div class="form-group">
                <input class="green" type="submit" name="acao" value="Cadastrar" />
            </div>
            
        </form>
    </div>
</section>


<script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH;?>js/jquery.mask.js"></script>
<script>
    $(document).ready(function(){
        $('.cpf').mask('000.000.000-00');
        $('.cnpj').mask('00.000.000/0000-00');
        $('.data').mask('00/00/0000');
        $('.tel').mask('(00)00000-0000');
    });
</script>