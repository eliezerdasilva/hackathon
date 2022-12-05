<main class="content">
    <?php
        renderTitle(
            'Bem vindo',
       
            ''
        );
        include(TEMPLATE_PATH . "/messages.php");
    ?>
    <div class="card">
        <div class="card-header">
            <h3><?= $today ?></h3>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
        
            
            </a>
        </div>
    </div>

    <form class="mt-5" action="innout.php" method="post">
        <div class="input-group no-border">
            <input type="text" name="forcedTime" class="form-control"
                placeholder="Secretária de Esporte">
   
              
            </button>
        </div>
    </form>

</main>