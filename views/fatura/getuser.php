<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Pesquisar Cliente</h1>
        <div style="align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=fatura&a=index" class="btn-styled" style="margin-left: 50px">Voltar á Lista</a>
            </div>
        </div>
        <div class="show-fatura">
            <form method="post" action="./router.php?c=fatura&a=getuser">
                <div style="align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
                    <div style="width: 30%;">
                        <input type="text" placeholder="Pesquisar Cliente..." name="cliente">
                    </div>
                </div>
                <div style="justify-content: center; align-items: center; display: flex">
                    <input type="submit" value="Pesquisar">
                </div>
            </form>
        <div style="text-align: -webkit-center; margin-top: 50px">
            <div class="row">
                <div style="width: 75%;  align-items: center; justify-content: center; display: flex">
                    <?= $output ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>