<?php 
  require("../assets/php/requirelogin.php");
  require("../assets/php/permissions.php");
  
  include_once "../assets/php/products.php";
  include_once "../assets/php/categories.php";

  $productError = false;
  $priceError = false;
  $imageError = false;

  $productCheck = true;

  if (isset($_POST["submit"])){
    $NomeProduto = $_POST["NomeProduto"];
    if(preg_match("/[^a-z0-9A-Z \`´\]+/", $NomeProduto)){
      $productError = true;
    } else if (strlen($NomeProduto) > 0){
      $productError = false;
    } else {
      $productError = true;
    }

    $Preco = $_POST["Preco"];
    if(preg_match("/[^0-9.]+/", $Preco)){
      $priceError = true;
    } else if (strlen($Preco) > 0){
      $priceError = false;
    } else {
      $priceError = true;
    }

    $Categoria = $_POST["Categoria"];
    
    //Stores the filename as it was on the client computer.
    $imagename = "produto-" . random_int(0, 999999999999999) . $_FILES['Imagem']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['Imagem']['type'];
    //Stores any error codes from the upload.
    $image_error = $_FILES['Imagem']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['Imagem']['tmp_name'];
    //The path you wish to upload the image to
    $imagePath = "../../FastOrder_Produtos/";

    if(is_uploaded_file($imagetemp)) {
      if ($productError == false && $priceError == false) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
          $imageError = false;
        }
        else {
          echo "Failed to move your image.<br>";
        }
      }
    }
    else {
      $imageError = true;
    }

    $product = new Product();
    $product->setNomeProduto($NomeProduto);
    $product->setPreco($Preco);
    $product->setImagem($imagename);
    $product->setIdCategoria($Categoria);

    if ($productError == false && $priceError == false && $imageError == false) {
      $productCheck = true;
    } else {
      $productCheck = false;
    }
    
    if ($productCheck == true) {
      $product->createProduct();

      header ("location: produtos.php");
    }
  }

  $category = new Category();
  $categories = $category->listCategory();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Fast Order">
  <title>FastOrder - Utilizadores</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                
              </div>
              
            </div>
          </div>
          <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </form>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              <!-- Dropdown header -->
              <div class="px-3 py-3">
                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
              </div>
              <!-- List group -->
              <div class="list-group list-group-flush">
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <!--<a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">-->
              </div>
              <!-- View all -->
              <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                  <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="../assets/php/logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
      </div>
    </div>
  </nav><s></s>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="dashboard.php">
          <img src="../assets/img/brand/FASTORDER.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <?php include_once "sidebar-html.php"; ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center bg-primary" style="min-height: 100px; background-size: cover; background-position: center top;">
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8 order-xl-1 center">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Novo Produto</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" enctype="multipart/form-data" method="POST">
                <?php if ($productCheck == false) { ?>
                <div class="form-group mb-3">
                  <div class="alert alert-danger" role="alert">
                    <?php if ($productError == true) {
                      echo "O nome do produto está inválido.<br>";
                      if ($priceError == true || $imageError == true) {
                        echo "<br>";
                      }
                    } 
                    if ($priceError == true) {
                      echo "O preço está inválido.<br>";
                    } 
                    if ($imageError == true) {
                      if ($priceError == true) {
                        echo "<br>";
                      }
                      echo "A imagem carregada não é válida.";
                    } ?>
                  </div>
                </div>
                <?php } ?>
                <div class="form-group mb-3">
                  <label for="idCategoria">Categoria</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-stream"></i></span>
                    </div>
                    <select name="Categoria" class="form-control">
                      <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category["idCategoria"]; ?>"><?php echo $category["NomeCategoria"]; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="idCategoria">Nome do produto</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <input name="NomeProduto" class="form-control" placeholder="Nome de Produto" type="username" required>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="idCategoria">Preço</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                    </div>
                    <input name="Preco" class="form-control" placeholder="Preço" type="price" required>
                  </div>
                </div>
                <!-- <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                    </div>
                    <input name="Preco" class="form-control" placeholder="Preço Individual" type="price" required>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                    </div>
                    <input name="Preco" class="form-control" placeholder="Preço Medio" type="price" required>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-euro-sign"></i></span>
                    </div>
                    <input name="Preco" class="form-control" placeholder="Preço Familiar" type="price" required>
                  </div>
                </div> -->
                <div class="form-group mb-3">
                  <label for="idCategoria">Imagem</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-image"></i></span>
                    </div>
                    <input name="Imagem" class="form-control" placeholder="Imagem" type="file" required>
                  </div>
                </div>
                <div class="text-center">
                  <a href="produtos.php" class="btn btn-secondary mt-3">Voltar</a>
                  <input type="submit" name="submit" class="btn btn-primary mt-3" value="Registar" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
          </div>
          <div class="col-lg-6">

          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>