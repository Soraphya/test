<?php

Painel::verificaPermissaoPagina(0);
$usuariosParceiros = Usuario::totalUsuariosPorCargo(3);
?>

<section class="painel-container">
    <div class="box-content">
    <?php 


        if(isset($_POST['acao'])){
            Parceiro::cadastrarParceiro($_POST);
        }

    ?>
        <div class="table-title">
                <i class="fa fa-share-alt"></i>
                <h2>Cadastrar Parceiro</h2>
        </div>
        
        <form class="form-dados" method="post">
            <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo @$_POST['nome']; ?>"/>
            </div>
            <div class="form-group">
                <label for="chave_pix">PIX:</label>
                <input type="text" name="chave_pix"  value="<?php echo @$_POST['chave_pix']; ?>"/>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input class="tel" type="text" name="telefone"  value="<?php echo @$_POST['telefone']; ?>"/>
            </div>
            <div class="form-group">
                <label for="data_pagamento">Dia de Pagamento:</label>
                <input type="text" name="data_pagamento"  value="<?php echo @$_POST['data_pagamento']; ?>"/>
            </div>
            <div class="form-group">
                <label for="cargo">Login:</label>
                <select name="login_id">
                    <option selected value="100">Selecione um login</option>
                    <?php

                    foreach ($usuariosParceiros as $key => $usuariosParceiro) {
                        echo '<option value="' . $usuariosParceiro['id'] . '">' . $usuariosParceiro['nome'] . '</option>';
                    }

                    ?>
                </select>
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