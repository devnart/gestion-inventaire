<?php
session_start();

if ($_SESSION['loggedIn']) {
} else {

    header('Location: login.php');
}

$user = $_SESSION['username'];
include('db_connect.php');

$search = $_POST['search_p'];
$searchby = $_POST['search'];
if (isset($_POST['search_p'])) {


    $sql = 'SELECT * FROM product where ' . $searchby . ' LIKE "' . $search . '%" ';

    // POST the result set (set of rows)
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

    // fetch the resulting rows as an array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $brand = $_POST['p_brand'];
    $category = $_POST['p_category'];
    $qty = $_POST['p_qty'];
    $price = $_POST['p_price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO product(id,name,brand,category,qty,price,description,image) VALUES('$id','$name','$brand','$category','$qty','$price','$description','$image')";

    if (mysqli_query($connection, $sql)) {
        header('Location: index.php');
    } else {
        echo 'Query Error' . mysqli_error($connection);
    }
}
if (isset($_POST['submit_edit'])) {
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $brand = $_POST['p_brand'];
    $category = $_POST['p_category'];
    $qty = $_POST['p_qty'];
    $price = $_POST['p_price'];
    $description = $_POST['description'];
    $image = $_POST['image'];


    $sql = "UPDATE product SET name='$name',brand='$brand',category='$category',qty='$qty',price='$price',description='$description',image='$image' WHERE id=$id";

    if (mysqli_query($connection, $sql)) {
        header('Location: index.php');
    } else {
        echo 'Query Error ' . mysqli_error($connection);
    }
}
if (isset($_POST['submit_edit'])) {
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $brand = $_POST['p_brand'];
    $category = $_POST['p_category'];
    $qty = $_POST['p_qty'];
    $price = $_POST['p_price'];
    $description = $_POST['description'];
    $image = $_POST['image'];


    $sql = "UPDATE product SET name='$name',brand='$brand',category='$category',qty='$qty',price='$price',description='$description',image='$image' WHERE id=$id";

    if (mysqli_query($connection, $sql)) {
        header('Location: index.php');
    } else {
        echo 'Query Error ' . mysqli_error($connection);
    }
}
//requete totale product
$sql = 'SELECT count(id) as total_p FROM product ';
// POST the result set (set of rows)
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

// fetch the resulting rows as an array
$total_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
// if(isset($_GET['delete_id']))
// {
//      $sql_query="DELETE FROM product WHERE id=".$_GET['delete_id'];
//      mysql_query($sql_query);
//      header("Location: index.php");
// }
?>
<?php
include 'delete_product.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
</head>

<body class="light">
    <aside class="sidebar">
        <div class="logo">
            <img src="images/logo_light.svg" alt="Dashboard Logo" />
        </div>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <div class="side-menu">
            <div class="aside-links">
                <div>
                    <img src="images/dashboard.svg" alt="">

                </div>
                <h2><a href="index.php">Dashboard</a></h2>
            </div>
            <div class="aside-links">
                <div>
                    <img src="images/folder.svg" alt="">

                </div>
                <h2>Categories</h2>
            </div>
            <div class="aside-links">
                <div>
                    <img src="images/calendar.svg" alt="">

                </div>
                <h2>Calendar</h2>
            </div>
            <div class="aside-links">
                <div>
                    <img src="images/message.svg" alt="">

                </div>
                <h2>Message</h2>
            </div>
            <form action="logout.php" method="POST">
                <div class="aside-links exit ">
                    <label for="logout">
                        <div>
                            <img src="images/exit.svg" alt="">
                        </div>
                        <h2>Exit</h2>
                    </label>

                    <input type="submit" name="logout" id="logout" hidden>
                </div>
            </form>

        </div>
        <!-- <div class="logout">
            <img src="images/exit.svg" alt="logout icon">
        </div> -->
    </aside>
    <section class="container">
        <form action="" method="POST" id="deleteSearch">
            <div class="username">
                <h3>Welcome, <?php echo $user ?></h3>
                <div class="avatar">
                    <img src="images/avatar.png" alt="Avatar" />
                </div>
            </div>
            <div class="options">
                <div class="add_delete">
                    <a href="#" class="btn" id="addBtn">Add</a>
                    <input href="javascript:void(0)" id="delete" type="submit" class="btn red disabled" name="delete22" value="Delete" onclick="deleteP()">
                </div>

                <input type="search" class="search" name="search_p" placeholder="Search .." onclick="searchP()" />
                <select name="search" id="search">
                    <option value="search" selected>Search By</option>
                    <option value="id">ID</option>
                    <option value="name">Name</option>
                    <option value="brand">Brand</option>
                    <option value="category">Category</option>
                </select>
            </div>

            <div class="insights">

                <div class="card">
                    <div>
                        <h4>Total Products</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>

                    <div>
                        <h3 id=""> <?php foreach ($total_products as $product) { ?>
                        <h3 id=""><?php echo $product['total_p']; ?></h3>
                        <?php } ?></h3>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <h4>Total Visitors</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div>
                        <h3>1.5K</h3>
                    </div>
                </div>

            </div>
            <div class="products">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($products as $product) { ?>


                        <tr>
                            <td><input type="checkbox" name="checkbox[]" class="item" value="<?php echo $product['id']; ?>" /></td>
                            <td class="id"><?php echo $product['id']; ?></td>
                            <td class="name"><?php echo $product['name']; ?></td>
                            <td class="brand"><?php echo $product['brand']; ?></td>
                            <td class="qty"><?php echo $product['qty']; ?></td>
                            <td class="price"><?php echo $product['price']; ?></td>
                            <td class="category"><?php echo $product['category']; ?></td>
                            <td class="image" style="display: none;"><img src="images/<?php echo $product['image']; ?>" alt=""></td>
                            <td class="description" style="display: none;"><?php echo $product['description']; ?></td>

                            <td>
                                <div>
                                    <a href="#"><img src="images/edit.svg" alt="edit" class="editBtn" /></a>
                                    <a href="javascript:delete_id(<?php echo $product['id']; ?>)"><img src="images/delete.svg" alt="delete" /></a>
                                </div>
                            </td>
                            <td class="moreInfo" style="cursor: pointer;">
                                <a href="#"><img src="images/arrow.svg" alt="arrow" /></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </form>
    </section>
    <div class="empty">
        <div>
            <img src="images/empty.svg" alt="Empty Icon">
        </div>
        <h2>There is no products. Click <span class="empty-span">here</span> to add</h1>

    </div>
    <div id="addModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>add new product</h2>
            <form action="index.php" method="POST">
                <div>
                    <label for="p_id">Product ID:</label>
                    <input type="text" name="p_id" id="p_id" required />
                </div>
                <div>
                    <label for="p_name">Product Name:</label>
                    <input type="text" name="p_name" id="p_name" required />
                </div>
                <div>
                    <label for="p_brand">Brand:</label>
                    <input type="text" name="p_brand" id="p_brand" required />
                </div>
                <div>
                    <label for="p_category">Category:</label>
                    <select name="p_category" id="p_category" required>
                        <option value="select">Select</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Phones">TV</option>
                        <option value="Phones">Phones</option>
                        <option value="Phones">Chaires</option>
                        <option value="Phones">Digital</option>
                        <option value="Phones">Animal</option>
                        <option value="Phones">Watches</option>
                    </select>
                </div>
                <div>
                    <label for="qty">Quantity</label>
                    <input type="number" name="p_qty" id="qty" required />
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" name="p_price" id="price" required />
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                </div>
                <div>
                    <input type="file" id="uploadImg" hidden name="image" />

                    <label for="uploadImg"><img src="images/upload.svg" alt="upload icon" style="display: inline; width: 90px; cursor: pointer" /></label>
                    <span id="file-chosen">No file chosen</span>
                </div>
                <input type="submit" value="submit" name="submit" />
            </form>
        </div>
    </div>
    <div id="editModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>edit product</h2>
            <form action="index.php" method="POST" class="editForm">
                <div>
                    <label for="p_id">Product ID:</label>
                    <input type="text" name="p_id" readonly />
                </div>
                <div>
                    <label for="p_name">Product Name:</label>
                    <input type="text" name="p_name" />
                </div>
                <div>
                    <label for="p_brand">Brand:</label>
                    <input type="text" name="p_brand" />
                </div>
                <div>
                    <label for="p_category">Category:</label>
                    <select name="p_category" id="category">
                        <option value="select">Select</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Phones">Phones</option>
                    </select>
                </div>
                <div>
                    <label for="qty">Quantity</label>
                    <input type="number" name="p_qty" />
                </div>
                <div>
                    <label for="Price">Price</label>
                    <input type="number" name="p_price" />
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" cols="30" rows="10"></textarea>
                </div>

                <div>
                    <div>
                        <img id='imgThumb' src="" alt="thumbnail">
                    </div>
                    <input type="file" id="editImg" hidden name="image" />

                    <label for="editImg"><img src="images/upload.svg" alt="upload icon" style="display: inline; width: 90px; cursor: pointer" /></label>
                    <span id="file-chosen-edit">No file chosen</span>
                </div>
                <input type="submit" value="Edit" name="submit_edit" />
            </form>
        </div>
    </div>

    <div id="info" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div>

                <div>
                    <img src="" alt="Product Image" class="product-image" />
                </div>
                <div>
                    <h2 class="product-title"></h2>
                    <p class="product-brand"></p>
                    <p class="product-parag">

                    </p>
                    <div>
                        <div>
                            <p>Qty</p>
                            <h3 class="product-qty"></h3>
                        </div>
                        <div>
                            <p>Price</p>
                            <h3 class="product-price"></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
<script src="js/main.js"></script>
</html>