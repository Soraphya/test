<?php Painel::verificaPermissaoPagina(0); ?>

<?php 

$id = $_GET['id'];

$dados = Painel::selectSingle('tb_control.parceiros', $id);

?>

<section class="painel-container">
    <div class="box-content">
    <?php

        if (isset($_POST['acao'])) {
           if(Painel::update($_POST)){
               Painel::alert('sucesso','Cliente atualizado com sucesso!');
               $dados = Painel::selectSingle('tb_control.parceiros',$id);
           }else{
               Painel::alert('erro','Erro ao atualizar cliente!');
           }
         }

    ?>
        <div class="table-title">
                <i class="fa fa-pencil-square-o"></i>
                <h2>Editar Parceiro</h2>
        </div>
        
        <form class="form-dados" method="post">
        <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $dados['nome']; ?>"/>
            </div>
            <div class="form-group">
                <label for="chave_pix">PIX:</label>
                <input type="text" name="chave_pix"  value="<?php echo $dados['chave_pix']; ?>"/>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input class="tel" type="text" name="telefone"  value="<?php echo $dados['telefone']; ?>"/>
            </div>
            <div class="form-group">
                <label for="data_pagamento">Dia de Pagamento:</label>
                <input type="text" name="data_pagamento"  value="<?php echo $dados['data_pagamento']; ?>"/>
            </div>

            <div class="form-group">
                <label for="login_id">Login:</label>
                <select name="login_id" id="">
                    <?php 
                        $usuariosParceiros = Usuario::totalUsuariosPorCargo(3);
                        foreach($usuariosParceiros as $chave => $value){ 
                    ?>
                    
                        <option <?php echo ($dados['login_id'] == $value['id']) ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>

                    <?php } ?>
                </select>
            </div>


            <h3></h3>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="nome_tabela" value="tb_control.parceiros">
                <input class="green" type="submit" name="acao" value="Atualizar" />
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