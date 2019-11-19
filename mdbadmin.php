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
<br>
<br>
 <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-danger">
              <div class="panel-heading">Online quiz system in php mongoDB</div>
              <div class="panel-body">Admin registration and Log in</div>
            </div>
        </div>
    </div>
 </div>
 
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        
            <div class="panel panel-info">
                <div clas="panel-heading"><h4>Admin login </h4></div>
                <div class="panel-body">
                    
		    <form method='post' action="mdbadlogin.php">
                     <div class="form-group">
                       <label for="name">Name:</label>
                       <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                     </div>
                     <div class="form-group">
                       <label for="pwd">Password:</label>
                       <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                     </div>
                     
                     <button type="submit" class="btn btn-default">Submit</button>
		   </form>
		
                </div>
            </div>
        </div>
    <div class="col-sm-6">
            <div class="panel panel-info">
                <div clas="panel-heading"><h4>Admin sign up</h4></div>
                  <div class="panel-body">
                    <form method='post' action="mdbadsignup.php">
                     <div class="form-group">
                       <label for="name">Name:</label>
                       <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                     </div>
                     <div class="form-group">
                       <label for="pwd">Password:</label>
                       <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                     </div>
                     
                     <button type="submit" class="btn btn-default">Submit</button>
                   </form>
                  </div>
            </div>
        </div>
  </div>
</div>

</body>
</html>

