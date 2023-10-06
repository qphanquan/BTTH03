<div class="alert alert-danger" role="alert">
    <?= $_GET['error'] ?>
</div>
<script>
    setTimeout(() => window.location.href = `${window.location.protocol}//${window.location.host}`, 2500);
</script>