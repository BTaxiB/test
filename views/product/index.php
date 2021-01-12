<?php
$items = $productCtrl->index();

if ($items->rowCount() > 0) { ?>
    <div class="container-fluid">
        <a href="/?create_product">
            Add New Product
        </a>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td><img src='" . $row['image'] . "'\></td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>";
                    echo "<a href='/?delete_product&id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                    echo "<a href='/?show_product&id=" . $row['id'] . "' class='btn btn-info'>Show</a>";
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