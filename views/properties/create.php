<main class="contenedor section">
    <h1>Create</h1>
    <?php foreach($errors as $error): ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__.'/form.php'; ?>
        <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>