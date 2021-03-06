<?php include __DIR__.'/../startHtml.php'; ?>

<nav class="nav mt-4">
  <a class="nav-link disabled" href="#"> Tabela <?= ucfirst($tituloPagina); ?></a>
  <a class="nav-link" href="/adicionar?table=<?= $tituloPagina; ?>">Adicionar </a>
  <a class="nav-link" href="#">Filtrar </a>
  <a class="nav-link" href="/json?table=<?= $tituloPagina; ?>" target="_blank">Json</a>
  
</nav>
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

      <td> <?= $datas[$field['Field']]; ?></td>

    <?php endforeach; ?>
    <td>
<a href="/viewPlus?table=<?= $_GET['table'];?>&coluna=<?= $columnName ?>&id=<?= $datas[$columnName] ?>" class="">
Vizualizar</a> |
       
         
         <a href="/delete?table=<?= $_GET['table'];?>&parameter=<?= $columnName ?>&id=<?= $datas[$columnName] ?>" class="">delele</a> |
          <a href="/update?table=<?= $_GET['table'];?>&parameter=<?= $columnName ?>&id=<?= $datas[$columnName] ?>" class="">update</a>
        </td>

</tr>
<?php endforeach; ?> 
   
  </tbody>
</table>
<a href="/home" class="btn btn-light">Voltar</a>

<?php include __DIR__.'/../endHtml.php'; ?>