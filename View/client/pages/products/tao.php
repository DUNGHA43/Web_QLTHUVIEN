<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form enctype="multipart/form-data" id="form-create-product" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" id="desc" name="description" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="0" min="0">
        </div>

        <div class="form-group">
            <label for="discount">% Discount</label>
            <input type="number" class="form-control" id="discount" name="discountPercentage" value="0" min="0">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="0" min="0">
        </div>

        <div class="form-group upload-image">
            <label for="thumbnail">Picture</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*" upload-image-input>
            <img src="" class="image-preview" upload-image-preview>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="number" class="form-control" id="position" name="position" placeholder="Auto increase" min="1">
        </div>

        <div class="form-group form-check form-check-inline">
            <input type="radio" class="form-check-input" id="statusActive" name="status" value="active" checked>
            <label for="statusActive" class="form-check-label">Active</label>
        </div>

        <div class="form-group form-check form-check-inline">
            <input type="radio" class="form-check-input" id="statusInactive" name="status" value="inactive">
            <label for="statusInactive" class="form-check-label">Inactive</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>

</body>

</html>