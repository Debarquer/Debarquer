<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, intitial-scale=1, shrink-to-fit=no">
      <title>Title</title>
      <link rel="Stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1>Hello Yrgo</h1>
    </header>

    <nav>
    </nav>

    <main>
      <article>
        <?php
        $conn = new mysqli("localhost", "admin", "");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['garbage'])){
          $name = $_GET['name'];
          $email = $_GET['email'];
          $garbage = $_GET['garbage'];
          $sql = "INSERT INTO test.test (name, email, garbage) VALUES ('$name', '$email', '$garbage')";

          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }

        echo "<table style='width:50%'>";
        $sql = "SELECT * FROM test.test";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['pk']."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['email']."</td>
                  <td>".$row['garbage']."</td></tr>";
          }
        } else {
          echo "0 results";
        }

        echo "</table>";
        ?>
      </article>
      <div>
        This will be a form
        <form method="get">
          Name<input type="text" name="name"></input><br>
          Email<input type="text" name="email"></input><br>
          Garbage<input type="text" name="garbage"></input><br>
          <input type="submit" value="Submit">
        </form>
      </div>
   </main>

   <footer>
     <small>This text is small.</small>
   </footer>
  </body>
</html>
