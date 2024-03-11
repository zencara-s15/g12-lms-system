<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details leave history</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php
  
  foreach ($detailHistory as $history){

  }
  ?>

  <div class="card" style=" margin-left: 20%; margin-right: 20%; margin-top: 170px;">
    <h2 class="card-header" style="color:blue">Details </h2>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Leave Type : <?= $detailHistory['leave_type'] ?></li>
      <li class="list-group-item">Start Date : <?= $detailHistory['start_date'] ?></li>
      <li class="list-group-item">End Date : <?= $detailHistory['end_date'] ?></li>
      <li class="list-group-item">Duration : <?= date_diff(new DateTime($detailHistory['start_date']),new DateTime($detailHistory['end_date']))->format('%a') ?></li>
      <li class="list-group-item">Reason : <?= $detailHistory['description'] ?></li>
      <li class="list-group-item">Leave Status : <?= $detailHistory['status'] ?></li>
     
    </ul>
     </?php endforeach;?>
    <div class="btn" style="margin-right:1200px;">
      <a href="/leave_history" class="btn  btn-success" style="font-size:13px">Back</a>
    </div>

  </div>

</body>

</html>