<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-2">
  <a class="nav-link disabled" href="#"> Adicionar <?= ucfirst($tituloPagina); ?></a>
  <a class="nav-link" href="/view?table=<?= $tituloPagina; ?>">Voltar </a>
  
  
</nav>

<form action="/addLinha" method="post">
        <div class="form-group">
        
        <input type="hidden" name="table" value="<?= $tituloPagina; ?>" class="form-control">

        <?php foreach($tableField as $fields): ?>
            <label style="text-transform:capitalize" for="<?= $fields;?>"><?= $fields; ?></label>
            <input type="text" id="<?= $fields;?>" name="<?= $fields;?>" class="form-control">    
        <?php endforeach; ?> 
           
        <button class="btn btn-primary mt-2">Salvar</button>
    </form>


<?php include __DIR__.'/../endHtml.php'; ?>