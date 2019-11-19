<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body> 


<div class="container">
    <div class="row">
        <div class="col-sm-8">
        
            <div class="panel panel-info">
                <div clas="panel-heading"><h4>Admin login </h4></div>
                <div class="panel-body">
                    
		    <form method='post' action="mdbimgin.php">
		     <div class="form-group">
                       <label for="url">Image path:</label>
                       <input type="text" class="form-control" id="url" placeholder="Enter url relative to server " name="url">
                     </div>
                     <div class="form-group">
                       <label for="name">Question :</label>
                       <input type="text" class="form-control" id="question" placeholder="Enter question" name="question">
                     </div>
                     <div class="form-group">
                       <label for="pwd">option1:</label>
                       <input type="text" class="form-control" id="opt1" placeholder="Enter option1" name="opt1">
                     </div>
		     <div class="form-group">
                       <label for="pwd">option2:</label>
                       <input type="text" class="form-control" id="opt2" placeholder="Enter option2" name="opt2">
                     </div>
                     <div class="form-group">
                       <label for="pwd">Correct option:</label>
                       <input type="number" class="form-control" id="cans" placeholder="Enter 1 or 2" name="cans">
                     </div>
                     <button type="submit" class="btn btn-default">Submit</button>
		   </form>
		
                </div>
            </div>
        </div>

<div>
</div>

