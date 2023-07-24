<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/stock/style.css')}}" />
    <title>Stock</title>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4  fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Fashion Site</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Stock</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper" style="background-color: #f0f0f0;">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Admin</h2>
                </div>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('/')}}">Go to Sytem</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


            <div class="container px-4">
                <div class="row g-3 my-2">
                    <form class="col-md-10" action="{{route('save-stock')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <label for="inputStockType">Stock Type</label>
                                <select class="form-select" name="stock-name">
                                    <option selected>Select Stock Type</option>
                                    <option value="Clothes">Clothes</option>
                                    <option value="Bags">Bags</option>
                                    <option value="Shoes">Shoes</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputItemName">Item Name</label>
                                <input type="text" class="form-control" name="item" id="inputItemName"
                                    required="required" placeholder="Item Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputInitialPrice">Initial Price (KES)</label>
                                <input type="number" class="form-control" name="initial_price" id="inputInitialPrice"
                                    placeholder="KES">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCurrentPrice">Current Price (KES)</label>
                                <input type="number" class="form-control" name="current_price" id="inputCurrentPrice"
                                    placeholder="KES">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputItemImage">Image</label>
                                <input type="file" class="form-control" name="image" id="inputItemImage">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>