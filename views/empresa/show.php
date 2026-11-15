<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Ver empresa</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
            </div>
        </div>
        <div class="show">
            <form>
                <div>
                    <label style="float: left">Designação</label>
                    <input readonly="true" type="text" value="<?= $empresa->designacao ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Email</label>
                    <input readonly="true" type="text" value="<?= $empresa->email ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Telefone</label>
                    <input readonly="true" type="text" value="<?= $empresa->telefone ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Nif</label>
                    <input readonly="true" type="text" value="<?= $empresa->nif ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Morada</label>
                    <input readonly="true" type="text" value="<?= $empresa->morada ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Código Postal</label>
                    <input readonly="true" type="text" value="<?= $empresa->codpostal ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Localidade</label>
                    <input readonly="true" type="text" value="<?= $empresa->localidade ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Capital</label>
                    <input readonly="true" type="text" value="<?= $empresa->capital . ' €' ?>" name="" class="form-control">
                </div>
            </form>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=empresa&a=edit&id=<?= $empresa->id ?>" class="btn-styled" style="margin-left: 50px">Editar informações</a>
            </div>
        </div>
    </div>
</div>