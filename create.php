
<?php



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=hillside_stuff', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$errors = [];
$Item = '';
$Description = '';
$UoM = '';
$Quantity = '';
settype($Quantity, 'float');
$Unit_Price = '';
settype($Unit_Price, 'float');
$Total = '';
settype($Total, 'float');
$G_T= 0.0;




if ($_SERVER['REQUEST_METHOD']==='POST'){
    $Item = $_POST['Item'];
    $Description = $_POST['Description'];
    $UoM = $_POST['UoM'];
    $Quantity = $_POST['Quantity'];
    $Unit_Price = $_POST['Unit_Price'];
    $Total = $_POST['Total'];
    

    
    if (!$Item){
      $errors[] = 'Product item is required';
    }
    if (!$Description){
      $errors[] = 'Product description is required';
    }
    if (!$Quantity){
      $errors[] = 'Product Quantity is required';
    }
    if (!$Unit_Price){
      $errors[] = 'Product unit price is required';
    }
    if (!$Total){
      $Total=$Quantity*$Unit_Price;
      
    }
    
if (empty($errors)) {
  $statement = $pdo->prepare("INSERT INTO lpo (Item, Description, UoM, Quantity, Unit_Price, Total)
                VALUE(:Item, :Description, :UoM, :Quantity, :Unit_Price, :Total)
");

$statement->bindValue(':Item', $Item);
$statement->bindValue(':Description', $Description);
$statement->bindValue(':UoM', $UoM);
$statement->bindValue(':Quantity', $Quantity);
$statement->bindValue(':Unit_Price', $Unit_Price);
$statement->bindValue(':Total', $Total);
$statement->execute();
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>LPO</title>
  </head>
  <body>
  <h1>Create LPO</h1>
  <?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
      <div><?php echo $error ?></div>
      <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Item</label>
    <input type="text" name="Item" class="form-control" value="<?php echo $Item?>"> 
  </div>
  <div class="form-group">
    <label>Description</label>
    <input type="text" name="Description" class="form-control" value="<?php echo $Description?>"> 
  </div>
  <div class="form-group">
    <label>UoM</label>
    <input type="text" name="UoM" value="<?php echo $UoM?>"  class="form-control" value="<?php echo $UoM ?>">
  </div>
  <div class="form-group">
    <label>Quantity</label> 
    <input type="number" step=".01" name="Quantity" value="<?php echo $Quantity ?>"  class="form-control" value="<?php echo $Quantity ?>" > 
  </div>
  <div class="form-group">
    <label>Unit Price</label>
    <input type="number" step=".01" name="Unit Price" value="<?php echo $Unit_Price ?>" class="form-control" value="<?php echo $Unit_Price ?>" > 
  </div>
  <div class="form-group">
    <label>Total</label>    
    <input type="number" step=".01" name="Total" value="<?php echo $Total ?>" class="form-control" value="<?php echo $Total ?>" > 

  </div> 
  <form> 
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
  
</form>
    
  </div>


</body>
<a href="Index.php"><button>Generate</button></a>
</html>