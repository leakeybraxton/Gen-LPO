
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <style>
    body {
        
        color: bg-green;
        height: 842px;
        width: 795px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    </style>
<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=hillside_stuff', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT*FROM lpo ORDER BY Item DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- <div style="width: 1200px; height: 600px;"> -->
<div class="form-group" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="display: block;"><div class="modal-dialog modal-xl" role="document">
  <!-- <div class="modal-content"> -->
    <!-- <div class="modal-header"> -->
    <!-- <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
    <h2 style= "position:relative; left:400px; top:2px;" class="modal-title" id="modalTitle"> Purchase Order</h2>
</div>
<!-- <div class="modal-body"> -->
  <div class="row">
    <div class="col-sm-12">
    
      <!-- <p class="pull-right"><b>Date:</b> <?php echo date("Y-m-d H:i:s");?> </p> -->
    </div>
  </div>
  <div class="row invoice-info">
    <p class="pull-right"><b> </b></p>
    <div class="col-sm-4 invoice-col"></textarea>
      <b>Supplier:</b> 
<?php
if ($_POST) // If form was submited...
{
    $text = $_POST["mytextarea"]; // Get it into a variable
    echo "<p>$text<p>"; // Print it!
}

?>
<form method="post">
    <textarea name="mytextarea"></textarea>
    <input type="submit" value="Go!" />
</form>
              </address>
          </div>

    <div class="col-sm-4 invoice-col">
      <b>SHIP TO:</b>
      <address>
                          <br>George Padmore Lane
                          <br>Nairobi,Kenya
                          <br>info@hillsidewholesalers.com
                          <br>sales@hillsidewholesalers.com
                          <br> 0718774554
                
                          
                  <br>Mobile: 0720 969125

                      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <b>LPO NO:</b>
      <?php
      $a='HSW_LPO';
      $b = 001;
      while($b==001){
        echo $a, '-', $b;
        $b++;
      }
      
      ?>
      <br>
      <b>Date:</b> <?php echo date("Y-m-d H:i:s");?><br>
      <b>Purchase Status:</b><select class="form-select" style="width: 100px;" aria-label="Default select example">
  <option selected>Select</option>
  <option value="1">Pending</option>
  <option value="2">Recieved</option>
  <option value="3">Sent</option>
  <option value="3">Cancelled</option>
</select>
</div>
      
</div>
</div>

  <br>
  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table bg-green">
          <thead>
          <table class="table">
          <tr class="bg-green">             
              <th scope="col">#</th>
              <th class="text-right">Item</th>
              <th class="text-right">Description</th>
              <th class="text-right">UoM</th>
              <th class="text-right">Quantity</th>
              <th class="no-print text-right">Unit_Price</th>             
              <th class="text-right">Total</th>                                          
            </tr>
          </thead>
          <tbody>
    <?php foreach ($products as $i => $product): ?>
        <tr>
            <th scope="row"><?php echo $i+1 ?></th>
            
            <td><?php echo $product['Item'] ?></td>
            <td><?php echo $product['Description'] ?></td>
            <td><?php echo $product['UoM'] ?></td>
            <td><?php echo $product['Quantity'] ?></td>
            <td><?php echo $product['Unit_Price'] ?></td>
            <td><?php echo $product['Total'] ?></td>
        
    

            <!-- <button type="button" class="btn btn-sm btn-outline-primary">Edit</button> -->
            <!-- <a href="create.php"><button>Add more</button></a> -->
            </td>
    <?php endforeach; ?>
    
  </tbody></table>
      </div>
    </div>
  </div>
  <br>
  
      </div>
    </div>
    <!-- <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table">
          <tr class="hide">
            <th>Total Before Tax: </th>
            <td></td>
            <td><span class="display_currency pull-right">300600</span></td>
          </tr>
          <tbody><tr>
          <div class="row g-3 align-items-center"> -->
          <?php
$con = mysqli_connect("localhost","root","","hillside_stuff");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$result = mysqli_query($con, 'SELECT SUM(Total) AS value_sum FROM lpo'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
?>
  <div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label"><h4>GRAND TOTAL:</h4></label>
  </div>
  
  <div class="col-auto">
    <span id="passwordHelpInline" class="form-text">
      <h2><?php echo $sum; ?></h2>
    </span>
  </div>
</div>

                          
             
            </span></td>
          </tr>
          
          
                      
        </tbody></table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6" border: 0.5px solid; padding: 20px; width: 300px; vertical: v50px; overflow: auto;>
      <strong>Prepared by:</strong><br>
      <div contentEditable="true">Name</div>
              </address>
          </div>
              </p>
    </div>
    <div class="col-sm-6">
      <strong>Additional Notes:</strong><br>
      <p class="well well-sm no-shadow bg-gray">
                  --
              </p>
    </div>
  </div>

  
  <div class="row print_section">
    <div class="col-xs-12">
      <img class="center-block" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8nMDZ4PCBxAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAJdJREFUOI1j+MzDzHweCAzsbc6f/3yY/zz/GeM/f84fPmxvf97Gxsbgz5//xgf+nGcYVTeqbiioowQwNhBSYVBT8fHx8cZ5NhUf8KtLOzvbLOewcdrZGdRRV3NGuiDhmHke7w786hLOFG883GNdZnmDkLrDxmw8xmmJBOxNONtsxiNhnHYQvzr7hMqfz9/fkLP5gz9cKAYA2NG9zlQNrw4AAAAASUVORK5CYII=">
    </div>
  </div>
</div>    
     
      
    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script></div>
<br>
<button onClick="window.print()">Print</button>
<a href="create.php"><button>Add more</button></a>
</html>

 
