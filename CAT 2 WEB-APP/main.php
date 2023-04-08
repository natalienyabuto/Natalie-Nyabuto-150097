<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
</head>
<style>

body{
  background-color: purple;
}

table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}

input {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

#button {
  text-align: center;
}
</style>
<body>
<div>
  <h2>Users</h2>
  <br>
	   <table>
                <tr style="text-align: left;
                  padding: 8px;">
                <th style="text-align: left;
                  padding: 8px;">User ID</th>
                <th style="text-align: left;
                  padding: 8px;">Fullname</th>
                <th style="text-align: left;
                  padding: 8px;">Email Address </th>
                <th style="text-align: left;
                  padding: 8px;">Password</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "web_dev");
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT `ID`, `Name`, `Email`, `Password` FROM `users`";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Password"] . "</td></tr>";
                }
                } else { echo "No users."; }
                $conn->close();
                ?>
                </table>
</div>
<br>
<br>
<div>
  <h2>Update User Details</h2>
  <br>
  <form action="functions.php" method="POST">
    <input type="text" name="username" required placeholder="Username">
    <br>
    <input type="text" name="name" required placeholder="Fullname">
    <br>
    <input type="email" name="email" required placeholder="Email Address">
    <br>
    <input type="password" name="password" required placeholder="Password">
    <br>
    <input type="submit" name="update" required value="Update">
  </form>
</div>
<div id ="button">
  <a href='login.html'>Logout</a>
</div>
</body>
</html>