<?= $this->include('layouts/head'); ?> <!-- Menyertakan file head -->
<?= $this->include('layouts/sidebar'); ?> <!-- Menyertakan file sidebar -->
<?= $this->renderSection('content'); ?> <!-- Bagian untuk konten dinamis -->
<?= $this->include('layouts/footer'); ?> <!-- Menyertakan file footer -->
<?= $this->include('layouts/main_js'); ?> <!-- Menyertakan file main_js -->