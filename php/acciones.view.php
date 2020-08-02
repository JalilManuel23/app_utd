<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title><?php echo $seccion ?></title>
</head>

<body <?php if($print){echo "onload='window.print()'";}?>>
    <header class="bg-dark">
        <div class="container">
            <nav class="row navbar-dark">
                <a class="col-md-4 d-flex justify-content-md-start justify-content-center" href="#"><img src="../img/UTD.png"
                        alt="Logo UTD" /></a>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <h3 class="titulo">
                        <?php echo $titulo; ?>
                    </h3>
                </div>
            </nav>
        </div>
    </header>
    <div class="container d-flex flex-column justify-content-around align-items-center contenedor-form">

