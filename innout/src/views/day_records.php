<main class="content">
    <?php
        renderTitle(
            'Bem vindo',
            'Gerenciamento de kits',
            'icofont-check-alt'
        );
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
            <p class="mb-0"></p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
               <h1>Importantes!</h1>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            
        </div>
    </div>

    <form class="mt-5" action="innout.php" method="post">
        <div class="input-group no-border">
            <input type="text" name="forcedTime" class="form-control"
                placeholder="FMEL - Fundação Municipal de Esportes e Lazer de Gaspar">
            
        </div>
    </form>

</main>