<?php if ($pager->getPageCount() > 1): ?>
<style>
/* Styling pagination Argon */
.pagination {
    justify-content: center;
    margin-top: 1rem;
}

.pagination .page-item .page-link {
    color: #324cdd; /* warna biru */
    background-color: #fff; /* background putih */
    border: 1px solid #324cdd;
    padding: 0.5rem 0.75rem;
    margin: 0 0.15rem;
    border-radius: 0.35rem;
    transition: background-color 0.3s, color 0.3s;
    font-weight: 600;
}

.pagination .page-item:hover .page-link {
    background-color: #324cdd;
    color: #fff;
    border-color: #324cdd;
}

.pagination .page-item.active .page-link {
    background-color: #324cdd;
    border-color: #324cdd;
    color: #fff !important;
    box-shadow: 0 0 10px rgb(50 76 221 / 0.5);
    cursor: default;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #ddd;
}

/* Panah Previous & Next */
.pagination .page-item .page-link span {
    font-weight: bold;
    font-size: 1.1rem;
}
</style>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <!-- Previous -->
    <?php
      $prevPage = $pager->getPrevious();
    ?>
    <?php if ($pager->hasPrevious() && !empty($prevPage)): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $prevPage ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link">&laquo;</span>
      </li>
    <?php endif; ?>

    <!-- Pages -->
    <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
      </li>
    <?php endforeach; ?>

    <!-- Next -->
    <?php
      $nextPage = $pager->getNext();
    ?>
    <?php if ($pager->hasNext() && !empty($nextPage)): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $nextPage ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    <?php else: ?>
      <li class="page-item disabled">
        <span class="page-link">&raquo;</span>
      </li>
    <?php endif; ?>
  </ul>
</nav>
<?php endif; ?>
