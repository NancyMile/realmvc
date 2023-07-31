<fieldset>
    <legend>Genral Info</legend>
    <label for="name">name</label>
    <input type="text" name="seller[name]" id="seller" placeholder="name" value="<?php echo sanitizingHtml($seller->name); ?>">
    <label for="lastname">Lastname</label>
    <input type="text" name="seller[lastname]" id="lastname" placeholder="lastname" value="<?php echo sanitizingHtml($seller->lastname); ?>">
    <label for="phone">Phone</label>
    <input type="text" id="phone" name=seller[phone]" value="<?php echo sanitizingHtml($seller->phone); ?>" placeholder="Phone">
</fieldset>