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
        <?php echo ucfirst($tables["Tables_in_{$dbname}"]); ?>
      </td>
      <td>
        <a href="/view?table=<?= $tables["Tables_in_{$dbname}"]; ?>" class="btn btn-light">Vizualizar</a>
        <a href="/view?table=<?= $tables["Tables_in_{$dbname}"]; ?>" class="btn btn-danger">Delete</a>
      </td>
</tr>
<?php endforeach; ?> 
   
  </tbody>
</table>

<?php include __DIR__.'/../endHtml.php'; ?>