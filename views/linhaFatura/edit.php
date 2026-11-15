<div class="edit-container">
    <div class="container">
        <h1 class="h1-centered-title">Editar linha fatura</h1>
        <div style="padding-bottom: 5px">
            <a href="./router.php?c=mainView&a=index" class="btn-styled" style="margin-left: 50px">Voltar ao Menu Principal</a>
        </div>
        <div class="edit">
            <form method="post" action="./router.php?c=linhafatura&a=update&id=<?= 1//$user->id ?>">
                <div>
                    <label style="float: left">Campo</label>
                    <input type="text" value="<?php //$user-> ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Campo</label>
                    <input type="text" value="<?php //$user-> ?>" name="" class="form-control">
                </div>
            </form>
        </div>
        <div style="justify-content: center; align-items: center; display: flex">
            <a type="submit" href="" class="btn-styled">Editar</a>
        </div>
    </div>
</div>