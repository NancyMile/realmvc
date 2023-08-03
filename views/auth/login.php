<main class="contenedor section contenido-centrado">
    <h1>Init Session</h1>
    <?php foreach($errors as $error):?>
        <p class="alert error">
            <?php echo $error; ?>
        </p>
    <?php endforeach; ?>
    <form class="formulario" method="POST" action="/login" novalidate>
        <fieldset>
            <legend>Email and Password</legend>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"placeholder="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="password">
        </fieldset>
        <input type="submit" value="login" class="btn-green">
    </form>
</main>