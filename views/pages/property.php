<main  class="contenedor section contenido-centrado">
    <h1><?php echo $property->title; ?></h1>
    <img loading="lazy" src="/images/<?php echo $property->image; ?>" alt="advert view">
    <div class="resume">
        <p class="price"><?php echo $property->price; ?></p>
        <ul class="icons-characteristics">
            <li>
                <img
                class="icon"
                loading="lazy"
                src="build/img/icono_wc.svg"
                alt="icon batrooms"
                />
                <p><?php echo $property->bathrooms; ?></p>
            </li>
            <li>
                <img
                class="icon"
                loading="lazy"
                src="build/img/icono_estacionamiento.svg"
                alt="icon garage"
                />
                <p><?php echo $property->garages; ?></p>
            </li>
            <li>
                <img
                class="icon"
                loading="lazy"
                src="build/img/icono_dormitorio.svg"
                alt="icon rooms"
                />
                <p><?php echo $property->rooms; ?></p>
            </li>
        </ul>
        <p>
            <?php echo $property->description; ?>
        </p>
    </div>
</main>