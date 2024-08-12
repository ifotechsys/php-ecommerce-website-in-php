<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 50px;
    }
    .form-container {
      max-width: 500px;
      margin: auto;
    }
    .form-group {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h2 class="text-center mb-4">User Registration Form</h2>
      <form action="register.php" method="post" enctype="multipart/form-data" class="form-container">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile No:</label>
          <input type="tel" class="form-control" id="mobile" name="mobile_no" required>
        </div>
        <div class="form-group">
          <label for="email">Email ID:</label>
          <input type="email" class="form-control" id="email" name="email_id" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="dob">Date of Birth:</label>
          <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="form-group">
          <label for="profile_pic">Profile Picture:</label>
          <input type="file" class="form-control" id="profile_pic" name="profile_pic" accept="image/*" required>
        </div>
        <button type="submit" name="submit" value="register" class="btn btn-primary btn-block">Register</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
