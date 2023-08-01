<main class="contenedor section">
    <h1>Admin Page</h1>
    <?php $message = displayMessages(intval($result));
      if($message){ ?>
        <p class="alert success"> <?php echo sanitizingHtml($message); ?> </p>
      <?php } ?>
    <a href="/properties/create" class="btn btn-green">Create Property</a>
    <a href="/sellers/create" class="btn btn-yellow">Create Seller</a>
      <h2>Properties</h2>
    <table class="properties">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Image</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- display results-->
      <tbody>
        <?php foreach($properties as $property): ?>
        <tr>
          <td><?php echo $property->id;?></td>
          <td><?php echo $property->title;?></td>
          <td><img src="/images/<?php echo $property->image;?>" alt="image" class="image-table"></td>
          <td>$ <?php echo $property->price;?></td>
          <td>
            <a href="/properties/update?id=<?php echo $property->id; ?>" class="btn-yellow-block">Update</a>
            <form method="POST" class="w-100" action="/properties/delete">
              <input type="hidden" name="id" value="<?php echo $property->id; ?>">
              <input type="hidden" name="type" value="properties">
              <input type="submit" class="btn btn-red-block" value ="Delete">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <h2>Sellers</h2>
    <table class="properties">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Actions</th>
        </tr>
      </thead>
      <!-- display results-->
      <tbody>
        <?php foreach($sellers as $seller): ?>
        <tr>
          <td><?php echo $seller->id;?></td>
          <td><?php echo $seller->name. ' '.$seller->lastname;?></td>
          <td><?php echo $seller->phone;?></td>
          <td>
            <a href="/sellers/update?id=<?php echo $seller->id; ?>" class="btn-yellow-block">Update</a>
            <form method="POST" class="w-100" action="/sellers/delete">
              <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
              <input type="hidden" name="type" value="sellers">
              <input type="submit" class="btn btn-red-block" value ="Delete">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</main>