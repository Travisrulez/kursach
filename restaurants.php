<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include("functions.php");
session_start();
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>ЕдуН</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet"> </head>
    <link rel="stylesheet" href="styles/dist/cars.css">

    <body>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
$item_total = 0;
foreach ($_SESSION["cart_item"] as $item)
{
?>

                                    <div class="title-row">
                                        <?php echo $item["title"]; ?>
                                       
                                        <a href="dishes.php?res_id=<?=$_SESSION['re_id'];?>&action=remove&id=<?php echo $_SESSION['dd_id'];?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>
                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "$".$item[ "price"]; ?> readonly id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                    </div>
                                    <?php
$item_total += ($item["price"]*$item["quantity"]);
}
?>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>Всего</p>
                                <h3 class="value"><strong><?php echo "$".$item_total; ?></strong></h3>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn theme-btn btn-lg">Заказать</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <?php 
        require_once 'header.php';
        ?>
            <div class="page-wrapper">
                <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
                    <div class="container"> </div>
                </div>
                <div class="result-show">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div>
                <section class="restaurants-page">
                    <div class="cars container">
                        <div class="card card-dark">
                            <img src="images/img/12345.jpg" alt="gsdgsd">
                            <div class="card-item">
                                <div class="card-title">
                                    <h3>sdgsdfgsdg</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-1">
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                                <div class="bg-gray restaurant-entry">
                                    <div class="row">
                                        <?php 
                                $cars = get_cars();
                                foreach ($cars as $car):
                                ?>
                                        <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                            <div class="entry-logo">
                                                <a class="img-fluid" href="dishes.php?res_id=<?=$car['rs_id']?>"> <img src="admin/imgs/cars/<?=$car['image']?>" alt="Food logo"></a>
                                            </div>
                                            <div class="entry-dscr">
                                                <h5>
                                                    <a href="dishes.php?res_id='.$rows['rs_id'].'">
                                                        <?=$car['title']?>
                                                    </a>
                                                </h5>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
                                                    <li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                            <div class="right-content bg-white">
                                                <div class="right-review">
                                                    <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                    <p></p> <a href="dishes.php?res_id=<?=$car['rs_id']?>" class="btn theme-btn-dash">Посмотреть меню</a> </div>
                                            </div>
                                        </div>
                                        <?php 
                                endforeach;
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
    </body>

</html>