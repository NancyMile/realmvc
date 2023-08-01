<main class="contenedor section">
    <h1>Update Property</h1>
    <a href="/admin" class="btn btn-green">Admin</a>
    <?php foreach($errors as $error): ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
      <?php include __DIR__.'/form.php' ?>
      <input type="submit" value="Update" class="btn btn-green">
    </form>
</main>
<?php addTemplate('footer'); ?>