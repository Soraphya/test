<?php Painel::verificaPermissaoPagina(0); ?>

<?php 

$id = $_GET['id'];

$dados = Cliente::selectSingle($id);

?>

<section class="painel-container">
    <div class="box-content">
    <?php

        if (isset($_POST['acao'])) {
           if(Painel::update($_POST)){
               Painel::alert('sucesso','Cliente atualizado com sucesso!');
               $dados = Cliente::selectSingle($id);
           }else{
               Painel::alert('erro','Erro ao atualizar cliente!');
           }
        // echo "<pre>";
        // print_r($_POST);
        // echo "<pre>";
         }

    ?>
        <div class="table-title">
                <i class="fa fa-pencil-square-o"></i>
                <h2>Editar Cliente - <?php echo $dados['empresa']; ?></h2>
        </div>
        
        <form class="form-dados" method="post">
            <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $dados['nome']; ?>"/>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input class="cpf" type="text" name="cpf"  value="<?php echo $dados['cpf']; ?>"/>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input class="data" type="text" name="data_nascimento"  value="<?php echo $dados['data_nascimento']; ?>" />
            </div>
            <h3>Dados da Empresa</h3>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa"  value="<?php echo $dados['empresa']; ?>"/>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input class="cnpj" type="text" name="cnpj"  value="<?php echo $dados['cnpj']; ?>"/>
            </div>
            <h3>Contato</h3>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input  type="email" name="email"  value="<?php echo $dados['email']; ?>"/>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input class="tel" type="text" name="telefone"  value="<?php echo $dados['telefone']; ?>"/>
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp:</label>
                <input class="tel" type="text" name="whatsapp"  value="<?php echo $dados['whatsapp']; ?>"/>
            </div>
            <h3>Banco de Dados</h3>
            <div class="form-group">
                <label for="host">DB Host:</label>
                <input type="text" name="host"  value="<?php echo $dados['host']; ?>"/>
            </div>
            <div class="form-group">
                <label for="nome_banco">DB Nome:</label>
                <input type="text" name="nome_banco"  value="<?php echo $dados['nome_banco']; ?>"/>
            </div>
            <div class="form-group">
                <label for="user">DB User:</label>
                <input  type="text" name="user"  value="<?php echo $dados['user']; ?>"/>
            </div>
            <div class="form-group">
                <label for="password">DB Senha:</label>
                <input  type="password" name="password"  value="<?php echo $dados['password']; ?>"/>
            </div>
            <h3>Outros</h3>
            <div class="form-group">
                <label for="vencimento_dia">Vencimento</label>
                <input type="text" name="vencimento_dia"  value="<?php echo $dados['vencimento_dia']; ?>"/>
            </div>
            <div class="form-group">
                <label for="parceiro">Parceiro:</label>
                <select name="parceiro" id="">
                    <?php 
                        $parceiros = Painel::listarTotal('tb_control.parceiros');
                        foreach($parceiros as $chave => $value){ 
                    ?>
                    
                        <option <?php echo ($dados['parceiro'] == $value['id']) ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>

                    <?php } ?>
                </select>
            </div>



            <h3></h3>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <input type="hidden" name="nome_tabela" value="tb_control.clientes">
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