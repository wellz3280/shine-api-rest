<?php include __DIR__.'/../startHtml.php'; ?>

<table class="table table mt-3">
  <thead>
    <tr>
      
      <th scope="col">Data Base</th>
      <th scope="col">Ação</th>
    
    </tr>
  </thead>
  <tbody>
    
<?php foreach($table as $tables): ?> 
<tr>
      <td style="font-size: 26px;">
        <?= $tables['Tables_in_testShine']; ?>
      </td>
      <td>
        <a href="/view?table=<?= $tables['Tables_in_testShine']; ?>" class="btn btn-dark">Vizualizar</a>
        <a href="/view?table=<?= $tables['Tables_in_testShine']; ?>" class="btn btn-danger">Delete</a>
      </td>
</tr>
<?php endforeach; ?> 
   
  </tbody>
</table>

<?php include __DIR__.'/../endHtml.php'; ?>