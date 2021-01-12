<?php

if (isset($_GET['id'])) {
    $product = $productCtrl->show($_GET['id']);

    $comments = $commentCtrl->productComments($product['id']);

    if ($_POST) {
        if (isset($_POST['name']) && isset($_POST['content']) && isset($_POST['product_id']))
            $commentCtrl->store([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'content' => $_POST['content'],
                'product_id' => $_POST['product_id']
            ]);
        header("Refresh: 0");
        exit();
    }
?>
    <div class="container-fluid">

        <?php
        echo "<h1 style='color:blue;'>" . $product['title'] . "</h1>";
        echo "<img src='" . $product['image'] . "'>";
        echo "<p>" . $product['description'] . "</p>";
        echo "<br><br><br><br>";
        ?>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="name">Your Name</label>
            <input type="text" name="name" class="form-control">

            <label for="name">Your Email</label>
            <input type="email" name="email" class="form-control">

            <label for="name">Comment</label>
            <input type="text" name="content" class="form-control">

            <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
            <input type="hidden" name="post_product_comment" value="1">
            <input type="submit" value="POST" class="btn btn-info">
        </form>

        <?php
        echo "Comments";
        while ($row = $comments->fetch(PDO::FETCH_ASSOC)) {
            echo "<h3 style='color:red;'>" . $row['name'] . "</h3>";
            if (isset($row['email'])) {
                echo "<h4>" . $row['email'] . "</h4>";
            }
            echo "<p>" . $row['content'] . "</p>";
        } ?>
    </div>

<?php
} else {
    header("Location: index.php");
}
?>