<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h1 {
            margin: 0;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .selected-images {
            text-align: left;
        }
        .selected-image {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .remove-image {
            color: red;
            cursor: pointer;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Entry Page</h1>
        <form enctype="multipart/form-data" action="<?php echo base_url('additems'); ?>">
            <input type="text" placeholder="Category (e.g., facial, eyes, lips)" required>
            <input type="text" placeholder="Title" required>
            <input type="number" placeholder="Price" required>
            <input type="number" placeholder="Discount">
            <textarea placeholder="Description" rows="4" required></textarea>
            <input type="text" placeholder="Size (optional)">
            <input type="text" placeholder="Shades (optional)">
            <input type="file" accept="image/*" id="imageInput" multiple>
            <div class="selected-images" id="selectedImages"></div>
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
<script>
    const imageInput = document.getElementById('imageInput');
    const selectedImages = document.getElementById('selectedImages');

    imageInput.addEventListener('change', function () {
        selectedImages.innerHTML = '';

        for (let i = 0; i < imageInput.files.length; i++) {
            const file = imageInput.files[i];
            const imageContainer = document.createElement('div');
            imageContainer.classList.add('selected-image');

            const textNode = document.createTextNode(file.name);

            const removeButton = document.createElement('span');
            removeButton.innerHTML = '✖';
            removeButton.classList.add('remove-image');
            removeButton.addEventListener('click', () => {
                imageInput.value = null; // Clear the file input
                imageContainer.remove(); // Remove the specific image container
            });

            imageContainer.appendChild(textNode);
            imageContainer.appendChild(removeButton);
            selectedImages.appendChild(imageContainer);
        }
    });
</script>


</html>