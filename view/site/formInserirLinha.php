<?php include __DIR__.'/../startHtml.php'; ?>

<?= $tituloPagina; ?>

<form action="/salvar-nota" method="post">
        <div class="form-group">
        <?php foreach($tableField as $fields): ?>
                <label for="<?= $fields;?>"><?= $fields;?></label>
            <input type="text" id="<?= $fields;?>" name="<?= $fields;?>" class="form-control">    
        <?php endforeach; ?> 
           
        <button class="btn btn-primary">Salvar</button>
    </form>


<?php include __DIR__.'/../endHtml.php'; ?>