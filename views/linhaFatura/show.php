<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Ver empresa</h1>
        <div style="padding-bottom: 5px">
            <a href="./router.php?c=mainView&a=index" class="btn-styled" style="margin-left: 50px">Voltar ao Menu Principal</a>
        </div>
        <div class="show">
            <form>
                <div>
                    <label style="float: left">Campo</label>
                    <input readonly="true" type="text" value="<?php //$user-> ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Campo</label>
                    <input readonly="true" type="text" value="<?php //$user-> ?>" name="" class="form-control">
                </div>
            </form>
        </div>
        <div>
            <a href="./router.php?c=empresa&a=edit&id=<?= 1 //$user->id ?>" class="btn-styled" style="margin-left: 50px">Editar informações</a>
        </div>
    </div>
</div>