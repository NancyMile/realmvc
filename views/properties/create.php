<main class="contenedor section">
    <h1>Create</h1>
    <form class="formulario" method="POST" action="/admin/properties/create.php" enctype="multipart/form-data">
        <?php include __DIR__.'/form.php'; ?>
        <input type="submit" value="Save" class="btn btn-green">
    </form>
</main>