<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-2">
  <a class="nav-link disabled" href="#"> Atualizar <?= ucfirst($tituloPagina); ?></a>
  <a class="nav-link" href="/view?table=<?= $tituloPagina; ?>">Voltar </a>
  
  
</nav>

<form action="/updateLinha" method="post">
        <div class="form-group">
        
        <input type="hidden" id="table" name="table" value="<?= $tituloPagina; ?>" class="form-control">

        <?php foreach(array_combine($keys,$values) as $k => $v): ?>

            <label style="text-transform:capitalize" for="<?= $k; ?>"><?= $k; ?></label>
            <input type="text" id="<?= $k; ?>" name="<?= $k; ?>" value="<?= $v; ?>" class="form-control">    
        <?php endforeach;  ?> 
           
        <button class="btn btn-primary mt-2">Alterar</button>
    </form>

<script language="javascript">
    const idColumn = '<?= $idColumn; ?>';

    const input = document.getElementById(idColumn);

    input.setAttribute('type','hidden');
</script>
<?php include __DIR__.'/../endHtml.php'; ?>
