<main class="contenedor section">
    <h1>Contact Us</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="contact">
    </picture>
    <h2>Please fill the form.</h2>
    <form class="formulario" method="POST" action="/contact">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="name">Name</label>
            <input type="text" name="contact[name]" id="name"placeholder="name" required>
            <label for="message">Message</label>
            <textarea id="message" name="contact[message]" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Property Information</legend>
            <label for="options">Sell or Rent</label>
            <select id="options" name="contact[type]" required>
                <option value="" disabled selected>-- Select --</option>
                <option value="sell">Sell</option>
                <option value="rent">Rent</option>
            </select>
            <label for="price">Price</label>
            <input type="number" min="1" name="contact[price]" id="price" placeholder="price" required>
        </fieldset>
        <fieldset>
            <legend>Contact</legend>
            <p>Best way to contact</p>
            <div class="contact-by">
                <label for="contact-phone">Phone</label>
                <input type="radio" name="contact[contact]" value="phone" id="phone" required>
                <label for="contact-email">Email</label>
                <input type="radio" name="contact[contact]" value="email" id="email" required>
            </div>
            <div id="contact"></div>
        </fieldset>
        <input type="submit" value="Send" class="btn-green">
    </form>
</main>