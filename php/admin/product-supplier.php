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

<?php if (isset($user) && $user["role"] == "admin"): ?>
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
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
        <link rel="shortcut icon" href="../../img/ggd-logo.png" type="image/x-icon">
        <link rel="stylesheet" href="../../css/product-supplier.css">
        <title>GOrder | Supplier</title>
    </head>
    <body>
        <nav class="top-nav bg-dark">
            <img class="logo" src="../../img/ggd-text-logo.png" alt="Golden Gate Drugstore">

            <ul>

                <li class="message-dropdown">
                    <a>
                        <i class="fa-solid fa-message"></i>
                    </a>
                </li>
                <div class="message-dropdown-container">

                    <a href="#">
                        <div class="from">
                            <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                            <h3>Emmanuel Ugaban</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis
                            iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a
                            nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                        <article>03/07/25</article>
                    </a>
                    <hr>

                    <a href="#">
                        <div class="from">
                            <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                            <h3>Emmanuel Ugaban</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis
                            iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a
                            nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                        <article>03/07/25</article>
                    </a>
                    <hr>

                    <a href="#">
                        <div class="from">
                            <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                            <h3>Emmanuel Ugaban</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis
                            iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a
                            nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                        <article>03/07/25</article>
                    </a>
                    <hr>

                    <a href="#">
                        <div class="from">
                            <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                            <h3>Emmanuel Ugaban</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis
                            iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a
                            nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                        <article>03/07/25</article>
                    </a>
                    <hr>

                    <a href="#">
                        <div class="from">
                            <img src="https://avatars.githubusercontent.com/u/89580716?v=4" alt="avatar">
                            <h3>Emmanuel Ugaban</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis, veritatis
                            iusto suscipit eos voluptate, quae totam nisi nihil facilis accusantium a
                            nesciunt labore, sit accusamus provident architecto delectus ipsa quas.</p>
                        <article>03/07/25</article>
                    </a>
                    <hr>

                </div>

                <li class="notification-dropdown">
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
                    <a href="avatar-profile.php">
                        <i class="fa-solid fa-user"></i>Profile</a>
                    <hr>
                    <a href="avatar-setting.php">
                        <i class="fa-solid fa-gear"></i>Settings</a>
                    <hr>
                    <a href="../../process/logout-process.php">
                        <i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                </div>
            </ul>

        </nav>

        <!-- side nav -->

        <div class="sidenav">
            <a href="admin.php">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

            <hr>

            <button class="dropdown-btn">
                <i class="fa-solid fa-capsules"></i>Products
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="product-all.php">
                    <i class="fa-solid fa-prescription"></i>All Products</a>
                <a href="product-inventory.php">
                    <i class="fa-solid fa-boxes-stacked"></i>Inventory</a>
                <a href="product-deliver.php">
                    <i class="fa-solid fa-truck"></i>Deliver</a>
                <a href="product-supplier.php" class="nav-active">
                    <i class="fa-solid fa-building"></i>Supplier</a>
            </div>

            <hr>

            <button class="dropdown-btn">
                <i class="fa-solid fa-chart-column"></i>
            </i>Sales
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="sales-daily.php">
                <i class="fa-solid fa-chart-line"></i>Daily</a>
            <a href="sales-monthly.php">
                <i class="fa-solid fa-chart-line"></i>Monthly</a>
            <a href="sales-yearly.php">
                <i class="fa-solid fa-chart-line"></i>Yearly</a>
        </div>

        <hr>

        <button class="dropdown-btn">
            <i class="fa-solid fa-folder"></i>Reports
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="report-sales.php">
                <i class="fa-solid fa-chart-column"></i>Sales</a>
            <a href="report-inventory.php">
                <i class="fa-solid fa-boxes-stacked"></i>Inventory</a>
            <a href="report-products.php">
                <i class="fa-solid fa-capsules"></i>Products</a>
            <a href="report-attendance.php">
                <i class="fa-solid fa-clipboard-user"></i>Attendance</a>
        </div>

        <hr>

        <button class="dropdown-btn">
            <i class="fa-solid fa-users"></i>Users
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="user-employee.php">
                <i class="fa-solid fa-user-tie"></i>Employee</a>
            <a href="user-customer.php">
                <i class="fa-solid fa-people-group"></i>Customer</a>
        </div>

        <hr>

        <button class="dropdown-btn">
            <i class="fa-solid fa-wrench"></i>Maintenance
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="user-employee.php">
                <i class="fa-solid fa-percent"></i>Tax</a>
            <a href="user-customer.php">
                <i class="fa-solid fa-percent"></i>Discount</a>
        </div>

        <hr>
        <a href="../pos.php">
            <i class="fa-solid fa-calculator"></i>POS</a>


    </div>

    <div class="main">

        <form class="search-bar mt-3">
            <input type="text" id="search" placeholder="Search..." value="">
            <button type="submit" disabled="disabled">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <div class="parent-container container row w-100 m-auto mt-5">

            <?php 
                $sql = "SELECT * FROM tblsupplier";
                $result = $conn->query($sql);

                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
            ?>
            <div class="supplier container row p-3 m-auto mb-3">
                <h4 class="supplier-name"><?php echo $row['supplier_name'] ?></h4>
                <hr class="mt-2">
                <table class="supplier-tbl">
                    <tr class="supplier-label text-info">
                        <td>Supplier ID</td>
                        <td>Contact Number</td>
                        <td>Email</td>
                    </tr>
                    <tr class="second-row">
                        <td><?php echo $row['supplier_id'] ?></td>
                        <td><?php echo $row['contact_number'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                    </tr>
                </table>
                <hr class="mt-3">
                <table class="add-table">
                    <tr>
                        <td class="add-table-label text-info">Address</td>
                    </tr>
                    <tr>
                        <td class="text-center mt-4"><?php echo $row['address'] ?></td>
                    </tr>
                </table>
            </div>
            <?php 
                    }
                }
              ?>

        </div>

    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
    <script src="../../javascript/side-nav-dropdown.js"></script>
    <script src="../../javascript/nav-avatar-dropdown.js"></script>
    <script src="../../javascript/nav-notif-dropdown.js"></script>
    <script src="../../javascript/nav-message-dropdown.js"></script>

<?php else: ?>
    <div
        class="no-account-selected"
        style="height: 90vh; display:flex; flex-direction:column; justify-content:center; align-items:center; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; color:red">
        <h1 style="font-size: 40px;">You don't have permission to access this page</h1>
        <a
            href="../../index.php"
            style="background-color: #007bff; color: white; padding:10px 30px; border-radius:5px; text-decoration:none; font-weight:900;">Login</a>
    </div>
    <?php endif; ?>
</body>
</html>