<?php Painel::verificaPermissaoPagina(2); ?>

<section class="painel-container">
    <div class="box-content">
    <?php 

$dados = Painel::selectSingle('tb_admin.dados',);

if(isset($_POST['acao'])){

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $empresa = $_POST['empresa'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];

    $query = "UPDATE `tb_admin.dados` SET ";
    $arr = [];

    foreach($_POST as $key => $value){
        if($key == 'acao'){
            continue;
        }
        if($key == 'email'){
            $query .= "`".$key."` = ?";
        }else{
            $query .= "`".$key."` = ?, ";
        }
        $arr[] = $value;

    }

    $query .= " WHERE `id` = 1";

    $sql = MySql::conectar()->prepare($query);
    if($sql->execute($arr)){
        Painel::alert('sucesso','Dados atualizados com sucesso!');
        $dados = Painel::selectSingle('tb_admin.dados',1);
    }else{
        Painel::alert('erro','Verifique seus dados novamente');
    }
}

?>
        <div class="table-title">
                <i class="fa fa-address-card-o"></i>
                <h2>Atualizar Dados</h2>
        </div>
        
        <form class="form-dados" method="post">
            <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $dados['nome']; ?>"/>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input class="cpf" type="text" name="cpf" value="<?php echo $dados['cpf']; ?>"/>
            </div>
            <div class="form-group">
                <label for="nascimento">Data de Nascimento:</label>
                <input class="data" type="text" name="nascimento" value="<?php echo $dados['nascimento']; ?>"/>
            </div>
            <h3>Dados da Empresa</h3>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa" value="<?php echo $dados['empresa']; ?>"/>
            </div>
            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input class="cnpj" type="text" name="cnpj" value="<?php echo $dados['cnpj']; ?>"/>
            </div>
            <h3>Contato</h3>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input class="tel" type="text" name="telefone" value="<?php echo $dados['telefone']; ?>"/>
            </div>
            <div class="form-group">
                <label for="whatstapp">WhatsApp:</label>
                <input class="tel" type="text" name="whatsapp" value="<?php echo $dados['whatsapp']; ?>"/>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input  type="email" name="email" value="<?php echo $dados['email']; ?>"/>
            </div>
            <div class="form-group">
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