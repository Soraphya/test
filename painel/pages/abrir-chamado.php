<?php

    $chamadosAbertos = Suporte::listaChamadoPorUsuario($_SESSION['id']);

?>

<div class="painel-container">
    <div class="box-content">
        <div class="table-title">
            <i class="fa fa-wrench"></i>
            <h2>Suporte</h2>
        </div>
    </div>
</div>



<div class="painel-container">
    <div class="box-content">
    <?php 
        if(isset($_POST['acao'])){

            $titulo = $_POST['suporte-titulo'];
            $mensagem = $_POST['suporte-texto'];

            if(!$titulo){
                Painel::alert('erro','Campo título vazio');
            }else if(!$mensagem){
                Painel::alert('erro','Campo mensagem vazio');
            }else{
                Suporte::insertSuport($titulo,$mensagem);
            }
        }
    ?>
    <form class="form-suporte" method="post">
            <div class="form-group">
                <label for="suporte-titulo">Assunto:</label>
                <input type="text" name="suporte-titulo" placeholder="Em que posso ajudar?"/>
            </div>
            <div class="form-group">
                <label for="suporte-texto">Mensagem:</label>
                <textarea name="suporte-texto" placeholder="Mensagem..." rows="10"></textarea>
            </div>
            <div class="form-group">
                <input class="green" type="submit" name="acao" value="Enviar" />
            </div>
            
        </form>
    </div>
</div>

<?php if($_SESSION['cargo'] == 2 || $_SESSION['cargo'] == 3){ ?>

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

<?php } ?>