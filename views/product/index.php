<?php 
$items = $productCtrl->index();

if ($items->rowCount() > 0) { ?>
    <div class="container-fluid">
        <a href="/?create_product">
            Add New Product
        </a>
        <table class="table table-striped">
            <tbody>
                <?php 
                $count = 0;
                while($row = $items->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td><a href='/?show_product&id=" . $row['id'] . "'>" . $row['title'] . "</a></td>";
                    echo "<td><img src='" . $row['image'] . "'\></td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
} else {
    echo "No data was found";
}
require_once './views/layouts/footer.php'; ?>