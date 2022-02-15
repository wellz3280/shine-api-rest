<?php include __DIR__.'/../startHtml.php'; ?>

<p style="margin-top:10px; font-size:22px; text-transform:capitalize">
 Tabela <?= $tituloPagina; ?>
</p>

<?php foreach($data as $key => $datas):?>
  <ul class="list-group list-group mt-2">
    <li class="list-group-item">
      <span style="font-weight: bold; font-size:22px; text-transform:capitalize;">
        <?= $key;?> 
      </span>
      :
      <span style="font-size:22px; text-transform:capitalize;">
        <?= $datas;?> 
      </span>

    </li>
    
  </ul>
<?php endforeach; ?> 

<a href="/view?table=<?= $tituloPagina;?>" class="btn btn-light mt-2">Voltar</a>
<?php include __DIR__.'/../endHtml.php'; ?>