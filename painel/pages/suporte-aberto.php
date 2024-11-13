<?php Painel::verificaPermissaoPagina(3); ?>
<?php

$id = $_GET['id'];

$chamado = Painel::selectSingle('tb_control.suporte', $id);
$respostas = Suporte::listaResposta($id);

if (isset($_POST['responder'])) {
    $mensagem = $_POST['suporte-texto'];
    if($mensagem){
        Suporte::responder($mensagem,$_SESSION['nome'],$id);
        if($_SESSION['cargo'] <= 1){
            Suporte::alteraChamado('R',$id);
        }else{
            Suporte::alteraChamado('A',$id);
        }
        $respostas = Suporte::listaResposta($id);
    }else{
        Painel::alert('erro','Digite uma mensagem antes de responder');
        
    }
}



?>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-wrench"></i>
            <h2>Suporte - #<?php echo $id; ?></h2>
        </div>

    </div>
</div>

<div class="painel-container">
    <div class="box-content">
        <?php
        
        if (isset($_POST['finalizar'])) {
            if(Suporte::alteraChamado('F',$id)){
                Painel::alert('sucesso','Suporte encerrado');
                die();
            }else{
                Painel::alert('erro','Erro ao fechar suporte');
            }
            
        }
        
        ?>
        <div class="table-title">
            <i class="fa fa-comments-o"></i>
            <h2>Mensagens</h2>
        </div>

        <div class="conversa">
            <h3><?php echo date('d/m/Y', strtotime($chamado['data'])) . " - " .  $chamado['titulo']; ?></h3>
            <p><?php echo $chamado['mensagem']; ?></p>
        </div>

        <?php

        foreach ($respostas as $key => $resposta) {

        ?>

            <div class="conversa">
                <h3><?php echo date('d/m/Y', strtotime($resposta['data'])) . " - " .  $resposta['remetente']; ?></h3>
                <p><?php echo $resposta['mensagem']; ?></p>
            </div>

        <?php } ?>
        <?php if($chamado['status'] != 'F'){ ?>
        <form method="post">
            <div class="form-group">
                
                <input class="green" name="finalizar" type="submit" value="Finalizar">
            </div>
        </form>
    </div>
</div>



<div class="painel-container">
    <div class="box-content">
        
        <div class="table-title">
            <i class="fa fa-comment-o"></i>
            <h2>Resposta</h2>
        </div>
    
        <form class="form-suporte" method="post">
            <div class="form-group">
                <label for="suporte-texto">Mensagem:</label>
                <textarea name="suporte-texto" placeholder="Mensagem..." rows="10"></textarea>
            </div>
            <div class="form-group">
                <input class="blue" name="responder" type="submit" value="Responder">
            </div>
            
        </form>
    </div>
</div>

<?php } else{ ?>

        <div class="table-title">
            <h2>Suporte encerrado</h2>
        </div>

<?php } ?>