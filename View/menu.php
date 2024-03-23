<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cf6aed4189.js" crossorigin="anonymous"></script>
    <style>
        .img-container {
            height: 200px;
            overflow: hidden;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container-lg pb-5">
        <?php
        $act = isset($_GET['act']) ? $_GET['act'] : "";
        $menu = new menu();
        $categories = $menu->getCategory($act);
        ?>
        <div class="d-flex align-items-start row">
            <div class="nav flex-column nav-pills me-3 w-25 col-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php
                while ($set = $categories->fetch()) :
                ?>
                    <button class="nav-link" id="<?= $set['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#<?= $set['id'] ?>" type="button" role="tab" aria-controls="<?= $set['id'] ?>" aria-selected="true"><?= $set['type'] ?></button>
                <?php endwhile; ?>
            </div>

            <div class="tab-content col-lg-12 col-md-6 col-6" id="v-pills-tabContent">
                <?php
                $categories = $menu->getCategory($act); // Retrieve categories again

                while ($set = $categories->fetch()) :
                ?>
                    <div class="tab-pane fade" id="<?= $set['id'] ?>" role="tabpanel" aria-labelledby="<?= $set['id'] ?>-tab">
                        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-2">
                            <?php
                            $products = $menu->getProduct_Category($set['id']);
                            while ($productSet = $products->fetch()) :
                            ?>
                                <div class="col img-thumbnail">
                                    <a href="index.php?action=product_detail&id=<?= $productSet['id'] ?>">
                                        <img src="Content/imagethecoffeehouse/<?= $productSet['image'] ?>" alt="" class="img-thumbnail img-thumbnail-fixed">
                                    </a>
                                    <p><a href="index.php?action=product_detail&id=<?= $productSet['id'] ?>" style="text-decoration: none; color: black; font-weight: bold;"><?= $productSet['name'] ?></a></p>
                                    <p><?= number_format($productSet['price'], 0, ",", ".") ?><sup><u>đ</u></sup></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>

</html>