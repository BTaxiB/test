<?php require_once './views/layouts/header.php';

if (isset($_GET['id'])) {
    $product = $productCtrl->show($_GET['id']);

    $comments = $commentCtrl->productComments($product['id']);
?>
    <div class="container-fluid">
        <form action="/?post_comment" method="POST">

        </form>
        <?php
        echo "<h1 style='color:blue;'>" . $product['title'] . "</h1>";
        echo "<img src='" . $product['image'] . "'>";
        echo "<p>" . $product['description'] . "</p>";
        echo "<br><br><br><br>";

        echo "Comments";
        while ($row = $comments->fetch(PDO::FETCH_ASSOC)) {
            echo "<h3 style='color:red;'>" . $row['name'] . "</h3>";
            echo "<h4>" . $row['email'] . "</h4>";
            echo "<p>" . $row['content'] . "</p>";
        } ?>
    </div>

<?php
} else {
    header("Location: index.php");
}
?>

<?php require_once './views/layouts/footer.php'; ?>