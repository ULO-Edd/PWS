<div class="body-create">
        <div class = "container">
            <h1 class="h1-centered-title">Criar Fatura</h1>
            <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
                <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                    <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
                </div>
            </div>
            <div>
                <div class="create-form">
                <form style="width: 30%" method="post" action="./router.php?c=fatura&a=store">
                    <div>
                        <label>Cliente</label>
                        <div style="display:flex">
                            <input style="width: 70%" readonly="true" value="<?= $cliente ?>" type="text" name="id_cliente">
                            <a style="width: 30%; height: 25px;" href="./router.php?c=fatura&a=getuser" class="btn-styled">Pesquisar Cliente</a>
                        </div>
                    </div>
                    <div>
                        <label>Produto</label>
                        <div style="display:flex">
                            <input style="width: 70%" readonly="true" type="text" name="id_produto">
                            <a style="width: 30%; height: 25px;" href="./router.php?c=fatura&a=getproduct&cliente=<?= $cliente ?>" class="btn-styled">Pesquisar Produto</a>
                        </div>
                    </div>
                    <div style="justify-content: center; align-items: center; display: flex">
                        <input type="submit" value="Criar">
                    </div>
                </form>
                </div>
            </div>

    </div>
</div>