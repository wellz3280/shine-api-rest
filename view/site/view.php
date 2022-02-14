<?php include __DIR__.'/../startHtml.php'; ?>

<table class="table table-hover mt-3">
  <thead>
    <tr>
      
      <th scope="col">Data Base</th>
      <th scope="col">Vizualizar</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    
<?php foreach($table as $tables): ?> 
<tr>
        <td>
                <a href="<?= $tables['Tables_in_testShine']; ?>" class="">
                        <?= $tables['Tables_in_testShine']; ?>
                </a>
        </td>
        <td>Otto</td>
        <td>@mdo</td>
</tr>
<?php endforeach; ?> 
   
  </tbody>
</table>

<?php include __DIR__.'/../endHtml.php'; ?>