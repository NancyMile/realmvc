<div class="container-adverts">
    <?php foreach($properties as $property): ?>
    <div class="advert">
        <img loading="lazy" src="/images/<?php echo $property->image;?>" alt="advert" />
        <div class="content-advert">
            <h3><?php echo $property->title;?></h3>
            <p><?php echo $property->description;?></p>
            <p class="price"><?php echo $property->price;?></p>
            <ul class="icons-characteristics">
            <li>
                <img
                class="icon"
                loading="lazy"
                src="build/img/icono_wc.svg"
                alt="icon batrooms"
                />
                <p><?php echo $property->bathrooms;?></p>
            </li>
            <li>
                <img
                class="icon"
                loading="lazy"
                src="build/img/icono_estacionamiento.svg"
                alt="icon garage"
                />
                <p><?php echo $property->garages;?></p>
            </li>
            <li>
                <img
                class="icon"
                loading="lazy"
                src="build/img/icono_dormitorio.svg"
                alt="icon rooms"
                />
                <p><?php echo $property->rooms;?></p>
            </li>
            </ul>
            <a class="btn btn-yellow-block" href="property?id=<?php echo $property->id;?>">Property</a>
        </div>
    <!-- content advert-->
    </div>
    <?php endforeach; ?>
    <!--end advert-->
</div>
<!--end container-adverts-->