<?php 
  session_start();

  if (isset($_SESSION["user_ID"])) 
  {
      include("../../database/db.php");
  
      $sql = "SELECT * FROM tblemployee
              WHERE user_ID = {$_SESSION["user_ID"]}";
      $result = $conn->query($sql);
      $user = $result->fetch_assoc();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,900;1,200;1,500&family=Roboto+Condensed:wght@300;400&display=swap');
    </style>
    <link rel="stylesheet" href="../../css/admin-nav.css">
    <link rel="stylesheet" href="../../css/admin-search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>GOrder | All Products</title>
</head>
<body>
  <?php if (isset($user) && $user["role"] == "admin"): ?>
      <nav class="top-nav">

        <img class="logo" src="../../img/ggd-text-logo.png" alt="Golden Gate Drugstore">

        <ul>

          <li class="message-dropdown"><a><i class="fa-solid fa-message"></i></a></li>
          <div class="message-dropdown-container">

              <a href="#">
               <div class="from">
                 <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                 <h3>Emmanuel Ugaban</h3>
               </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                <article>03/07/25</article>
              </a>
              <hr>

              <a href="#">
               <div class="from">
                 <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                 <h3>Emmanuel Ugaban</h3>
               </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                <article>03/07/25</article>
              </a>
              <hr>

              <a href="#">
               <div class="from">
                 <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                 <h3>Emmanuel Ugaban</h3>
               </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                <article>03/07/25</article>
              </a>
              <hr>

              <a href="#">
               <div class="from">
                 <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                 <h3>Emmanuel Ugaban</h3>
               </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                <article>03/07/25</article>
              </a>
              <hr>

              <a href="#">
               <div class="from">
                 <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                 <h3>Emmanuel Ugaban</h3>
               </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                <article>03/07/25</article>
              </a>
              <hr>

          </div>

          <li  class="notification-dropdown">
            <i class="fa-solid fa-bell"></i>
            <?php
              $sql = "SELECT * FROM tblproducts
              WHERE product_qty < critical_level";
              $result = $conn->query($sql);
              
              if($result->num_rows >0)
              {
            ?>
              <span class="badge rounded-pill badge-notification bg-danger"><?php echo $result->num_rows?></span>
            <?php
              }
            ?>
          </li>
          <div class="notification-dropdown-container">
            <?php 
              if($result->num_rows > 0)
              {
                while($row = $result->fetch_assoc())
                {
            ?>
                  <a href="#">
                    <?php
                      if($row['product_qty'] > 0)
                      {
                        echo "Product ".$row['product_name']." Low Quantity";
                      }
                      else 
                      {
                        echo "<span style='color: red;'>".$row['product_name']."</span> is out of stock";
                      }
                    ?>
                  </a>
                  <hr>
            <?php
                }
              }
            ?>
          </div>
          
          <li class="avatar-dropdown"><img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar"></li>
            <div class="avatar-dropdown-container">
              <a href="avatar-profile.php"><i class="fa-solid fa-user"></i>Profile</a>
              <hr>
              <a href="avatar-setting.php"><i class="fa-solid fa-gear"></i>Settings</a>
              <hr>
              <a href="../../process/logout-process.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </div>
        </ul>

      </nav>
        
      <!-- side nav -->

      <div class="sidenav">
        <a href="admin.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>

        <hr>

        <button class="dropdown-btn"><i class="fa-solid fa-capsules"></i>Products
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="product-all.php" class="nav-active"><i class="fa-solid fa-prescription"></i>All Products</a>
          <a href="product-inventory.php"><i class="fa-solid fa-boxes-stacked"></i>Inventory</a>
          <a href="product-deliver.php"><i class="fa-solid fa-truck"></i>Deliver</a>
          <a href="product-supplier.php"><i class="fa-solid fa-building"></i>Supplier</a>
        </div>
        
        <hr>

        <button class="dropdown-btn"><i class="fa-solid fa-chart-column"></i></i>Sales
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="sales-daily.php"><i class="fa-solid fa-chart-line"></i>Daily</a>
          <a href="sales-monthly.php"><i class="fa-solid fa-chart-line"></i>Monthly</a>
          <a href="sales-yearly.php"><i class="fa-solid fa-chart-line"></i>Yearly</a>
        </div>

        <hr>

        <button class="dropdown-btn"><i class="fa-solid fa-folder"></i>Reports
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="report-sales.php"><i class="fa-solid fa-chart-column"></i>Sales</a>
          <a href="report-inventory.php"><i class="fa-solid fa-boxes-stacked"></i>Inventory</a>
          <a href="report-products.php"><i class="fa-solid fa-capsules"></i>Products</a>
          <a href="report-attendance.php"><i class="fa-solid fa-clipboard-user"></i>Attendance</a>
        </div>

        <hr>

        <button class="dropdown-btn"><i class="fa-solid fa-users"></i>Users
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="user-employee.php"><i class="fa-solid fa-user-tie"></i>Employee</a>
          <a href="user-customer.php"><i class="fa-solid fa-people-group"></i>Customer</a>
        </div>

        <hr>

        <button class="dropdown-btn"><i class="fa-solid fa-wrench"></i>Maintenance
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="user-employee.php"><i class="fa-solid fa-percent"></i>Tax</a>
          <a href="user-customer.php"><i class="fa-solid fa-percent"></i>Discount</a>
        </div>

        <hr>

      </div>

      <div class="main">
        <form class="search-bar">
            <input type="text" id="search" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <table class="table table-striped mt-4">
              <thead>
              <tr>
                  <th>Product Code</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Measurement</th>
                  <th>Critical Level</th>
                  <th>Quantity</th>
                  <th>Description</th>
              </tr>  
              </thead>

              <tbody id="results">

              </tbody>
        </table>
      </div>
      
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() { // When the user types in the search field
            var query = $(this).val(); // Get the search query
            if (query.length >= 3) { // If the query is at least 3 characters long
                $.ajax({
                url: '../../process/search-process.php',
                type: 'POST',
                data: { query: query },
                success: function(data) {
                    $('#results').html(data); // Update the search results
                }
                });
            }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>    
    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="../../javascript/side-nav-dropdown.js"></script>
    <script src="../../javascript/nav-avatar-dropdown.js"></script>
    <script src="../../javascript/nav-notif-dropdown.js"></script>
    <script src="../../javascript/nav-message-dropdown.js"></script>

  <?php else: ?>  
      <div class="no-account-selected"">
          <h1>You don't have permission to access this page</h1>
      </div>
  <?php endif; ?>
</body>
</html>