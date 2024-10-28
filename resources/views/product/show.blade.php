<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports World</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- OWL Car -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <!-- Showmore css -->
    <link rel="stylesheet" href="/css/showMoreItems-theme.min.css">
    <!-- Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#mynav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynav">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar -->
                    <br>
                    <div class="col-lg-2 col-md-4 fixed-top sidebar">
                        <br>
                        <div class="bottom-border pb-3">
                            <img src="./img/photo_2023-09-15_05-14-18.jpg" alt="" width="60" class="rounded-circle">
                            <a href="#" class="text-light">AmerOniza</a>
                        </div>
                        <ul class="navbar-nav flex-column mt-5">
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link text-light p-3 mb-2 sidebar-link current">
                                    <i class="fa fa-home text-light fa-lg mr-3"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-database text-light fa-lg mr-3"></i>All Products
                                </a>
                            </li>
                                <a href="{{route('categories.index')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-database text-light fa-lg mr-3"></i>All Categories
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('orders.index')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-database text-light fa-lg mr-3"></i>All Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.create')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-plus-circle text-light fa-lg mr-3"></i>Add Product
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.create')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-plus-circle text-light fa-lg mr-3"></i>Add Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.trashed')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-trash text-light fa-lg mr-3"></i>Trashed Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.trashed')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-trash text-light fa-lg mr-3"></i>Trashed Categories
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Top Nav -->
                    <div class="col-lg-10 col-md-8 ml-auto fixed-top cstm-header align-items-center top-nav">
                        <div class="row">
                            <div class="col-lg-4 col-md-8 d-flex justify-content-center align-items-center pl-5">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link mx-2 text-light" href="/">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-2 text-light" href="{{route('orders.index')}}">Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-2 text-light" href="dashboard">Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block"></div>
                            <div class="col-md-4 col-lg-2 mt-2 justify-content-end align-items-center">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <button class="btn btn-outline-light mx-2" data-toggle="modal">
                                        <i class="fa fa-sign-out" aria-hidden="true">
                                            {{ __('Logout') }}
                                        </i>
                                    </button>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Top Nav Ends -->
                </div>
            </div>
        </div>

    </nav>


    <!-- Table Start -->
    <section>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-10 col-md-8 ml-auto">
                    <div class="row align-items-center pt-md-5 mt-md-5 mb-5">
                        <!-- First Table -->
                        <div class="col-12 mb-4 mb-xl-0">
                            <h4 class="text-muted text-center mb-3">Product</h4>
                            <table class="table bg-light table-striped  text-center" id="allproduct">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Categories</th>
                                    <th>Price</th>
                                    <th>action</th>
                                </tr>
                                <tr>
                                    <td class="align-middle">{{$product->name}}</td>
                                    <td class="align-middle">{{$product->description}}</td>
                                    <td>
                                        @foreach($product->categories as $category)
                                                <li>{{$category->name}}</li>  
                                        @endforeach
                                    </td>
                                    <td class="align-middle">{{$product->price}}</td>
                                    <td class="align-middle">
                                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('products.edit',$product->id)}}">
                                                <button type="button" class="btn btn-outline-secondary">Edit</button>
                                            </a>
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table End -->



    <!-- Bootstrap js -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <!-- OWL Car -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Show More js -->
    <script src="js/showMoreItems.min.js"></script>
    <!-- Data TAble -->
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Theme js -->
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>