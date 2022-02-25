<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-2">
  <a class="nav-link disabled" href="#"> Atualizar <?= ucfirst($tituloPagina); ?></a>
  <a class="nav-link" href="/view?table=<?= $tituloPagina; ?>">Voltar </a>
  
  
</nav>

<form action="/addLinha" method="post">
        <div class="form-group">
        
        <input type="hidden" id="table" name="table" value="<?= $tituloPagina; ?>" class="form-control">

        <?php foreach(array_combine($keys,$values) as $k => $v): ?>

            <label style="text-transform:capitalize" for="<?= $k; ?>"><?= $k; ?></label>
            <input type="text" id="<?= $k; ?>" name="<?= $k; ?>" value="<?= $v; ?>" onload="hiddenId" class="form-control">    
        <?php endforeach; ?> 
           
        <button class="btn btn-primary mt-2">Alterar</button>
    </form>

<script language="javascript">
  
    
    function hiddenId(){
        const idColumns = "<?php echo $keys[0];?>";
        let idName = document.getElementsByName(idColumns);
        let name = idName[0].id;
        
        if(idColumns === name){
            alert("são iguais");
        }
    }
    
</script>
<?php include __DIR__.'/../endHtml.php'; ?>
