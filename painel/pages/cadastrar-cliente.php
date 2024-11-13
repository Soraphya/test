<?php 

Painel::verificaPermissaoPagina(0); 
$usuariosClientes = Usuario::totalUsuariosPorCargo(2);

?>

<section class="painel-container">
    <div class="box-content">
    <?php 


        if(isset($_POST['acao'])){
            Cliente::cadastrarCliente($_POST);
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
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input class="cpf" type="text" name="cpf"  value="<?php echo @$_POST['cpf']; ?>"/>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input class="data" type="text" name="data_nascimento"  value="<?php echo @$_POST['data_nascimento']; ?>" />
            </div>
            <h3>Dados da Empresa</h3>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa"  value="<?php echo @$_POST['empresa']; ?>"/>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input class="cnpj" type="text" name="cnpj"  value="<?php echo @$_POST['cnpj']; ?>"/>
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
            <h3>Banco de Dados</h3>
            <div class="form-group">
                <label for="host">DB Host:</label>
                <input type="text" name="host"  value="<?php echo @$_POST['host']; ?>"/>
            </div>
            <div class="form-group">
                <label for="nome_banco">DB Nome:</label>
                <input type="text" name="nome_banco"  value="<?php echo @$_POST['nome_banco']; ?>"/>
            </div>
            <div class="form-group">
                <label for="user">DB User:</label>
                <input  type="text" name="user"  value="<?php echo @$_POST['user']; ?>"/>
            </div>
            <div class="form-group">
                <label for="password">DB Senha:</label>
                <input  type="password" name="password"  value="<?php echo @$_POST['password']; ?>"/>
            </div>
            <h3>Outros</h3>
            <div class="form-group">
                <label for="vencimento_dia">Vencimento</label>
                <input type="text" name="vencimento_dia"  value="<?php echo @$_POST['vencimento_dia']; ?>"/>
            </div>
            <div class="form-group">
                <label for="parceiro">Parceiro:</label>
                <select name="parceiro" id="">
                    <?php 
                        $parceiros = Painel::listarTotal('tb_control.parceiros');
                        foreach($parceiros as $chave => $value){ 
                    ?>
                    
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="login_id">Login:</label>
                <select name="login_id">
                    <option selected value="100">Selecione um login</option>
                    <?php

                    foreach ($usuariosClientes as $key => $usuariosCliente) {
                        echo '<option value="' . $usuariosCliente['id'] . '">' . $usuariosCliente['nome'] . '</option>';
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