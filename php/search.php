<?php
include_once '../process.php';

if (!empty($_POST["keyword"])) {
    $query = "SELECT * FROM product WHERE product_name LIKE '" . $_POST["keyword"] . "%' ORDER BY product_id LIMIT 0,6";
    $result = mysqli_query($config, $query);
    if (!empty($result)) {
        ?>
<ul id="product-list">
<?php
        foreach ($result as $pro) {
            ?>
<li onClick="selectproduct('<?php echo $pro["product_no"]; ?>');"><?php echo $pro["product_no"]. " " .$pro['product_name']; ?></li>
<?php } ?>
</ul>
<?php } } ?>