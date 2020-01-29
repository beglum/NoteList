<?php $pagination = $data['pagination']; ?>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item<?php if ($pagination['currentPage'] <= 1) { echo " disabled"; } ?>">
            <a class="page-link" href="<?php echo $pagination['paginationLink'] . ($pagination['currentPage'] - 1); ?>"<?php if ($pagination['currentPage'] <= 1) { echo ' tabindex="-1"'; } ?> aria-disabled="true">← Туда</a>
        </li>

        <?php
            $currentPage = $pagination['currentPage']-2;
            if ($currentPage <= 1) $currentPage = 2;
            $stopPage = $pagination['currentPage'] + 2;
            if ($stopPage >= $pagination['countPages']) $stopPage = $pagination['countPages'] - 1;

            $margin_from_start = '';
            $margin_from_end = '';
            if ($stopPage < $pagination['countPages'] - 1) $margin_from_end = ' ml-4';
            if ($currentPage > 2) $margin_from_start = ' mr-4';
            ?>

        <li class="page-item<?php if ($paginationa['currentPage'] == 1) { echo ' active'; } echo $margin_from_start; ?>"><a class="page-link" href="<?php echo $pagination['paginationLink']; ?>1">1</a></li>

            <?php
            while ($currentPage <= $stopPage) {
                $active = '';
                if ($pagination['currentPage'] == $currentPage) $active = ' active';
                echo '<li class="page-item'. $active .'"><a class="page-link" href="'. $pagination['paginationLink'] . $currentPage .'">'. $currentPage .'</a></li>';
                $currentPage++;
            }

            
            if ($pagination['countPages'] > 1) {
                ?>
        <li class="page-item <?php if ($pagination['currentPage'] == $pagination['countPages']) { echo ' active'; } echo $margin_from_end; ?>"><a class="page-link" href="<?php echo $pagination['paginationLink'] . $pagination['countPages']; ?>"><?php echo $pagination['countPages']; ?></a></li>
                <?php
            }
        ?>
        <li class="page-item<?php if ($pagination['currentPage'] >= $pagination['countPages']) { echo " disabled"; } ?>">
            <a class="page-link"<?php if ($pagination['currentPage'] >= $pagination['countPages']) { echo ' tabindex="-1"'; } ?> href="<?php echo $pagination['paginationLink'] .  ($pagination['currentPage'] + 1); ?>">Сюда →</a>
        </li>
    </ul>
</nav>