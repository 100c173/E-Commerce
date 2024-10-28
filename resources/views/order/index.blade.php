<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- OWL Car -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Showmore css -->
    <link rel="stylesheet" href="css/showMoreItems-theme.min.css">
    <!-- Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Orders</title>
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
                            <p> <strong>Admin :</strong>
                                <a href="dashboard" class="text-light">{{Auth::user()->name}}</a>
                             </p>
                        </div>
                        <ul class="navbar-nav flex-column mt-5">
                            <li class="nav-item">
                                <a href="dashboard" class="nav-link text-light p-3 mb-2 sidebar-link current">
                                    <i class="fa fa-home text-light fa-lg mr-3"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.index')}}" class="nav-link text-light p-3 mb-2 sidebar-link">
                                    <i class="fa fa-database text-light fa-lg mr-3"></i>All Products
                                </a>
                            </li>
                            <li class="nav-item">
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

    <section>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-10 col-md-8 ml-auto">
                    <div class="row align-items-center pt-md-5 mt-md-5 mb-5">
                        <!-- First Table -->
                        <div class="col-12 mb-4 mb-xl-0">
                            <h4 class="text-muted text-center mb-3">All Orders</h4>
                            <table class="table bg-light table-striped  text-center" id="allproduct">
                                <tr>
                                    <th>Order</th>
                                    <th>Price</th>
                                    <th>Created_at</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->product->name}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        @if($order->isPending())
                                        <form action="{{route('orders.status',$order->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="canceled">
                                            <button type="button" class="btn btn-warning">
                                                {{$order->status}}
                                                <div class="spinner-grow text-light" role="status"></div>
                                            </button>

                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                        </form>

                                        @elseif($order->isShipped())
                                        <form action="{{route('orders.status',$order->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="delivered">
                                            <button type="button" class="btn btn-primary">{{$order->status}}</button>

                                            <button type="submit" class="btn btn-light">Take</button>
                                        </form>

                                        @elseif($order->isDelivered())
                                        <button type="button" class="btn btn-success">{{$order->status}}</button>

                                        @elseif($order->isCanceled())
                                        <form action="{{route('orders.status',$order->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="pending">
                                            <button type="button" class="btn btn-danger">{{$order->status}}</button>
                                            <button type="submit" class="btn btn-warning">reOrder</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col">
                                        <form action="{{route('orders.destroy',$order->id)}}" method='post'>
                                            @method('Delete')
                                            @csrf  
                                            @if(!($order->isDelivered()))
                                              <a href="{{route('orders.finsh',$order->id)}}">
                                                <button type="button" class="btn btn-primary">finsh</button>
                                              </a> 
                                            @else
                                              <button type="button" class="btn btn-success">Completed</button>
                                            @endif
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        
   
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>