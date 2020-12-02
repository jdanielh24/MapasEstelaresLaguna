<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-E Laguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

    <?php include('layout/header.php'); ?>

    <div class="contenedor seccion">
        <form class="col-md-12" method="post">
            <div class="site-blocks-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-thumbnail">
                                <img src="images/cloth_1.jpg" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">Top Up T-Shirt</h2>
                            </td>
                            <td>$49.00</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>
                                </div>

                            </td>
                            <td>$49.00</td>
                            <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                        </tr>

                        <tr>
                            <td class="product-thumbnail">
                                <img src="images/cloth_2.jpg" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">Polo Shirt</h2>
                            </td>
                            <td>$49.00</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>
                                </div>

                            </td>
                            <td>$49.00</td>
                            <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <?php include('layout/footer.php'); ?>

</body>

</html>