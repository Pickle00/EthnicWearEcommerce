<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <link rel="stylesheet" href="style/upload.css">
</head>

<body>

    <div class="form-container">
        <h2>Upload Product</h2>
        <form method="post" action="add_item.php" enctype="multipart/form-data">


            <div class="form-group">
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product-name" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="gender" value="male" required> Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="female" required> Female
                    </label>
                    <label>
                        <input type="radio" name="gender" value="unisex" required> Unisex
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Dress">Dress</option>
                    <option value="Neckpiece">Neckpiece</option>
                    <option value="Earrings">Earrings</option>
                    <option value="Head">Head Accessory</option>
                    <option value="Other">Other Accessories</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="pimage" type="image/*" required>
            </div>

            <button type="submit" class="submit-btn">Upload Product</button>
        </form>
    </div>

</body>

</html>