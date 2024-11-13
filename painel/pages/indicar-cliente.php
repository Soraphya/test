<?php 

Painel::verificaPermissaoPagina(3); 

?>

<section class="painel-container">
    <div class="box-content">
    <?php 


        if(isset($_POST['acao'])){
            Cliente::indicarCliente($_POST);
        }

    ?>
        <div class="table-title">
                <i class="fa fa-users"></i>
                <h2>Cadastrar Cliente</h2>
        </div>
        
        <form class="form-dados" method="post">
            <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo @$_POST['nome']; ?>"/>
            </div>
            
            <h3>Dados da Empresa</h3>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa"  value="<?php echo @$_POST['empresa']; ?>"/>
            </div>
            
            <h3>Contato</h3>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input  type="email" name="email"  value="<?php echo @$_POST['email']; ?>"/>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input class="tel" type="text" name="telefone"  value="<?php echo @$_POST['telefone']; ?>"/>
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp:</label>
                <input class="tel" type="text" name="whatsapp"  value="<?php echo @$_POST['whatsapp']; ?>"/>
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