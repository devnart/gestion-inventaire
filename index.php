<?php
session_start();

if($_SESSION['loggedIn']){
    
}else {
    
    header('Location: login.php');
}

$user = $_SESSION['username'];
include('db_connect.php');

// write query for all pizzas
$sql = 'SELECT * FROM product ORDER BY date DESC';

// POST the result set (set of rows)
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

// fetch the resulting rows as an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
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
            <a href="#"><h2>dashboard</h2></a>
            <a href="#"><h2>Categories</h2></a>
            <ul>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">TV</a></li>
                <li><a href="#">Smart Phones</a></li>
                <li><a href="#">Tables</a></li>
                <li><a href="#">Chaires</a></li>
                <li><a href="#">Lamp</a></li>
                <li><a href="#">Laptops</a></li>
            </ul>
        </div>
    </aside>
    <section class="container">
        <div class="username">
            <h3>Welcome, <?php echo $user?></h3>
            <div class="avatar">
                <img src="images/avatar.png" alt="Avatar" />
            </div>
        </div>
        <div class="options">
            <div class="add_delete">
                <a href="#" class="btn" id="addBtn">Add</a>
                <a href="javascript:void(0)" class="btn red disabled">Delete</a>
            </div>

            <input type="search" class="search" placeholder="Search .." />
            <select name="search" id="search">
                <option value="search" selected>Search By</option>
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="brand">Brand</option>
                <option value="category">Category</option>
            </select>
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
                        <td><input type="checkbox" class="item" /></td>
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
                                <a href="#"><img src="images/edit.svg" alt="edit" class="editBtn"  /></a>
                                <a href="#"><img src="images/delete.svg" alt="delete" /></a>
                            </div>
                        </td>
                        <td class="moreInfo">
                            <a href="#"><img src="images/arrow.svg" alt="arrow" /></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
    <div id="addModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>add new product</h2>
            <form action="index.php" method="POST">
                <div>
                    <label for="p_id">Product ID:</label>
                    <input type="text" name="p_id" id="p_id" />
                </div>
                <div>
                    <label for="p_name">Product Name:</label>
                    <input type="text" name="p_name" id="p_name" />
                </div>
                <div>
                    <label for="p_brand">Brand:</label>
                    <input type="text" name="p_brand" id="p_brand" />
                </div>
                <div>
                    <label for="p_category">Category:</label>
                    <select name="p_category" id="p_category">
                        <option value="select">Select</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Phones">Phones</option>
                    </select>
                </div>
                <div>
                    <label for="qty">Quantity</label>
                    <input type="number" name="p_qty" id="qty" />
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" name="p_price" id="price" />
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <input type="file" id="uploadImg" hidden name="image" />

                    <label for="uploadImg"><img src="images/upload.svg" alt="upload icon" style="display: inline; width: 90px; cursor: pointer" /></label>
                    <span id="file-chosen">No file chosen</span>
                </div>
                <input type="submit" value="submit" name="submit"/>
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
                    <input type="text" name="p_id" readonly/>
                </div>
                <div>
                    <label for="p_name">Product Name:</label>
                    <input type="text" name="p_name"/>
                </div>
                <div>
                    <label for="p_brand">Brand:</label>
                    <input type="text" name="p_brand"/>
                </div>
                <div>
                    <label for="p_category">Category:</label>
                    <select name="p_category" id="category" >
                        <option value="select">Select</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Phones">Phones</option>
                    </select>
                </div>
                <div>
                    <label for="qty">Quantity</label>
                    <input type="number" name="p_qty"/>
                </div>
                <div>
                    <label for="Price">Price</label>
                    <input type="number" name="p_price"/>
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" cols="30" rows="10" ></textarea>
                </div>

                <div>
                    <div>
                        <img id='imgThumb' src="" alt="thumbnail">
                    </div>
                    <input type="file" id="editImg" hidden name="image" />

                    <label for="editImg"><img src="images/upload.svg" alt="upload icon" style="display: inline; width: 90px; cursor: pointer" /></label>
                    <span id="file-chosen">No file chosen</span>
                </div>
                <input type="submit" value="Edit" name="submit_edit"/>
            </form>
        </div>
    </div>

    <div id="info" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div>

                <div>
                    <img src="" alt="Product Image" class="product-image"/>
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