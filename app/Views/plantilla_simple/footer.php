<!-- Plantilla-->
<script src="<?= base_url() ?>public/assets/plantilla/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/assets/plantilla/js/plantilla.js"></script>

<!-- Jquery -->
<script src="<?= base_url() ?>public/assets/librerias/jquery/jquery-3.7.1.js"></script>

<!-- Utilidades -->
<script src="<?= base_url() ?>public/assets/js/utilidades.js"></script>

<!-- Variables globales -->
<script>
    const base_url = '<?= base_url() ?>';
    const token_name = '<?= csrf_token() ?>';
    const token_hash = '<?= csrf_hash() ?>';
</script>

<!-- Librerias js de cada modulo -->
<?php
if (is_array($libjs)) {
    foreach ($libjs as $libreria) {
        echo view($libreria);
    }
}
?>

</body>

</html>