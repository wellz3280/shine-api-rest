<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-2">
  <a class="nav-link disabled" href="#"> Adicionar <?= ucfirst($tituloPagina); ?></a>
  <a class="nav-link" href="/view?table=<?= $tituloPagina; ?>">Voltar </a>
  
  
</nav>
<?= $count;?>
<form action="/salvar-nota" method="post">
        <div class="form-group">
        <?php foreach($tableField as $fields): ?>
            <label for="<?= $fields;?>"><?= $fields; ?></label>
            <input type="text" id="<?= $fields;?>" name="<?= $fields;?>" class="form-control">    
        <?php endforeach; ?> 
           
        <button class="btn btn-primary mt-2">Salvar</button>
    </form>


<?php include __DIR__.'/../endHtml.php'; ?>