<main class="contenedor section">
    <h1>Create Seller</h1>
    <a href="/admin" class="btn btn-green">Admin</a>
    <?php foreach($errors as $error): ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" action="/sellers/create">
    <?php include __DIR__.'/form.php'; ?>
    <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>