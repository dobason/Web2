<div class="pagination">
    <?php
    $queryData = array_merge($param, ['per_page' => $item_per_page]);

    if ($current_page > 3) {
        $queryData['page'] = 1;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Trang đầu</a>
        <?php
    }

    if ($current_page > 1) {
        $queryData['page'] = $current_page - 1;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Trước</a>
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
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Tiếp</a>
        <?php
    }

    if ($current_page < $totalPages - 3) {
        $queryData['page'] = $totalPages;
        ?>
        <a class="page-item" href="?<?= http_build_query($queryData) ?>">Trang cuối</a>
        <?php
    }
    ?>
</div>

<style>
            .pagination {
                display: flex;
                padding-left: 0;
                list-style: none;
                border-radius: .25rem;
                justify-content: flex-end;
            }
            .page-item {
                position: relative;
                display: block;
                padding: 15px;
                margin-left: -1px;
                line-height: 1.25;
                background-color: #fff;
                border: 1px solid #dee2e6;
                border-radius: 8px;;
            }
            .current-page {
                color: #007bff;
                font-weight: bold;
            }
</style>
