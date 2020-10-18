<?php
$arquivo = file_get_contents('https://covid19-brazil-api.now.sh/api/report/v1');
 
// Decodifica o formato JSON e retorna um Objeto
$json = json_decode($arquivo);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>Lendo JSON com PHP usando a API covid19-brazil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/fomart.js"></script>
</head>
<body>

<div class="container">
  <h2>Lendo JSON com PHP usando a API covid19-brazil</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>Estados</th>
        <th>Consfirmados</th>
        <th>Mortes</th>
        <th>Suspeitos</th>
        <th>Recuperados 24 horas</th>
        <th>Data Atualização</th>
      </tr>
    </thead>
    <tbody>

      <?php
         // Loop para percorrer o Objeto
         foreach($json->data as $registro):
      ?>
      <tr>
         <td><?php echo $registro->state; ?></td>
         <td ><?php echo number_format($registro->cases, 2, '.', ''); ?></td>
         <td><?php echo $registro->deaths; ?></td>
         <td><?php echo $registro->suspects; ?></td>
         <td><?php echo $registro->refuses; ?></td>
         <td><?php echo date("d/m/Y H:i:s" , strtotime($registro->datetime)); ?></td>
         </tr>
         <?php
         
         endforeach;
        ?>
      

    </tbody>
  </table>
</div>

</body>
</html>


