<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-4">
  <a class="nav-link disabled" href="#"> Tabela <?= ucfirst($tituloPagina); ?></a>
  <a class="nav-link" href="#">Adicionar </a>
  <a class="nav-link" href="/<?= $tituloPagina; ?>">Json</a>
  
</nav>
<!-- 
    <p style="color:blue; font-size: 2em; text-transform:capitalize; margin-top:5px;">
    Tabela .json</p> -->

    <table class="table table-hover mt-3">
  <thead>
    <tr>
    <?php  foreach($columns as $field): ?>
      
      <th scope="col"><?= $field['Field']; ?></th>

    <?php endforeach; ?>
    <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    
<?php foreach($data as $datas): ?> 
<tr>  
<?php  foreach($columns as $field): ?>

      <td><?= $datas[$field['Field']]; ?></td>

    <?php endforeach; ?>
        <td>
          <a href="" class="">delele</a> |
          <a href="" class="">update</a>
        </td>

</tr>
<?php endforeach; ?> 
   
  </tbody>
</table>


<?php include __DIR__.'/../endHtml.php'; ?>