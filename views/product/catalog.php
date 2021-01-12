<?php
$row1 = $productCtrl->indexPaginated(0, 3);
$row2 = $productCtrl->indexPaginated(4, 3);
$row3 = $productCtrl->indexPaginated(0, 3);


if ($row1->rowCount() > 0) { ?>
    <div class="container-fluid">
        <tbody>
            <?php
            echo "<div class='row'>";
            while ($row = $row1->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="' . $row['image'] . '" alt="' . $row['title'] . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $row['title'] . '</h5>
                      <p class="card-text">' . $row['description'] . '</p>
                    </div>
                  </div>';
            }
            echo "</div>";

            if ($row2->rowCount() > 0) {
                echo "<div class='row'>";
                while ($row = $row2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="' . $row['image'] . '" alt="' . $row['title'] . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $row['title'] . '</h5>
                      <p class="card-text">' . $row['description'] . '</p>
                    </div>
                  </div>';
                }
                echo "</div>";
            }
            if ($row3->rowCount() > 0) {
                echo "<div class='row'>";
                while ($row = $row3->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="' . $row['image'] . '" alt="' . $row['title'] . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $row['title'] . '</h5>
                      <p class="card-text">' . $row['description'] . '</p>
                    </div>
                  </div>';
                }
                echo "</div>";
            }
            ?>
        </tbody>
    </div>

<?php
} else {
    echo "No data was found";
}
require_once './views/layouts/footer.php'; ?>