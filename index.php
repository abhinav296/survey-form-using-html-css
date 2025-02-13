<?php 
include "connect.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
     $uname = $_POST['fname']; 
     $lname= $_POST['lname'];
     $email= $_POST['email'];
     $branch=$_POST['branch'];
     $domain = $_POST['domain'];
     $about = $_POST['about'];
     $sql="INSERT INTO survey_form (fname, lname, email, branch, domain, about) VALUES (?, ?, ?, ?, ?, ?)";
     $stmt = $conn->prepare($sql);
     if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $uname, $lname, $email, $branch, $domain, $about);


 
     if ($stmt->execute()) {
         echo "Registration successful!";
     } else {
         echo "Error: " . $stmt->error;
     }
 
     $stmt->close();
     $conn->close();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form Fix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <form method="POST" action="index.php" >

                         <h1>Survey Form</h1>
        <div class="mb-3">
            <label for="name" class="form-label"> First Name</label>
            <input type="text" class="form-control" name="fname" placeholder="First Name">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="name" name="lname" placeholder="Last Name">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Email</label>
            <input type="varchar" class="form-control" id="name" name ="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="select" class="form-label">Branch</label>
            <select class="form-select" id="select" name="branch">
                <option >CS</option>
                <option>EC</option>
                <option>MT</option>
                <option>ME</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Select" class="form-label">Domain</label>
            <select class="form-select" id="select" name="domain">
                <option>Front-end</option>
                <option>Back-end</option>
                <option>Full-Stack</option>
                <option>CyberSecurity</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="textarea" class="form-label">Tell About Yourself</label>
            <textarea class="form-control" id="textarea" rows="3" name="about"></textarea>
        </div>
       <div class="mb-3">
        <input type="submit" name="submit">
       </div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
 body {
    background: url('r.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    background-color: rgba(255, 255, 255, 0.9); /* Slight transparency */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 50px auto;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
}

.form-label {
    font-weight: bold;
    color: #495057;
}

.form-control,
.form-select,
textarea {
    border-radius: 8px;
    border: 1px solid #ced4da;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color:rgb(85, 13, 194);
}

textarea {
    resize: none;
}


</style>