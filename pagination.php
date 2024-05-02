<div id="pagination">
    <?php
    $queryData = array_merge($param, ['per_page' => $item_per_page]);

    if ($current_page > 3) {
        $queryData['page'] = 1;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">First</a>
        <?php
    }

    if ($current_page > 1) {
        $queryData['page'] = $current_page - 1;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Prev</a>
        <?php
    }

    for ($num = 1; $num <= $totalPages; $num++) {
        if ($num != $current_page) {
            if ($num > $current_page - 3 && $num < $current_page + 3) {
                $queryData['page'] = $num;
                ?>
                <a class="page-item" href="?<?= http_build_query($queryData) ?>"><?= $num ?></a>
                <?php
            }
        } else {
            ?>
            <strong class="current-page page-item"><?= $num ?></strong>
            <?php
        }
    }

    if ($current_page < $totalPages - 1) {
        $queryData['page'] = $current_page + 1;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Next</a>
        <?php
    }

    if ($current_page < $totalPages - 3) {
        $queryData['page'] = $totalPages;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Last</a>
        <?php
    }
    ?>
</div>
