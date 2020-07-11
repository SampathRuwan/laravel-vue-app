<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Laravel-Vue-App</title>
        <!-- Fonts -->
        <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet" >
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!--style css-->
        <link href="{{ asset('css/template/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/template/modal.css') }}" rel="stylesheet">


    </head>

    <body id="page-top">
{{--    start the vue html--}}
        <div id="app_vue">

            <!-- Page Wrapper -->
            <div id="wrapper">
                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Laravel-Vue App</div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Products
                    </div>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Add Products</span></a>
                    </li>

                </ul>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Search -->
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                </li>

                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter">3+</span>
                                    </a>
                                </li>

                                <!-- Nav Item - Messages -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-envelope fa-fw"></i>
                                        <!-- Counter - Messages -->
                                        <span class="badge badge-danger badge-counter">7</span>
                                    </a>

                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Name</span>
        {{--                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">--}}
                                    </a>
                                </li>

                            </ul>

                        </nav>
                        <!-- End of Topbar -->

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Products</h1>
                            </div>
                            <a id="product-add-modal" @click="productAddModal = true" class="btn btn-primary btn-icon-split btn-sm mb-4">
                                <span class="icon text-white-50">
                                  <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="text text-white">Add Product</span>
                            </a>

                            <div class="row">

                                <div class="col-lg-12">
                                    <!-- Default Card Example -->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Product Details
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">SKU</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Inventory</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="product in products">
                                                    <th scope="row">@{{product.id}}</th>
                                                    <td>@{{product.name}}</td>
                                                    <td>@{{product.sku}}</td>
                                                    <td>@{{product.description}}</td>
                                                    <td>@{{product.inventory}}</td>
                                                    <td><a class="btn btn-warning text-white btn-circle btn-sm">
                                                            <i class="fas fa-pen"></i></a>
                                                        <a class="btn btn-danger text-white btn-circle btn-sm">
                                                            <i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Laravel Vue Application 2020</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!--modal designs starts-->
            <modal v-if="productAddModal" class="modal" @close="productAddModal = false">
                <h5 slot="header">Add Product</h5>
                <div slot="body">
                    <form>
                        <p class="text-center alert alert-danger"
                           v-bind:class="{ disnone: hasError }">Please fill all fields!</p>
                        <p class="text-center alert alert-danger"
                           v-bind:class="{ disnone: hasError }">numbers</p>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Product Name" v-model="productItem.name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sku" name="sku"
                                        placeholder="SKU" v-model="productItem.sku">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="Description" v-model="productItem.description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inventory" class="col-sm-2 col-form-label">Inventory</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inventory" name="inventory"
                                       placeholder="Inventory" v-model="productItem.inventory" >
                            </div>
                        </div>
                    </form>

                </div>
                <div slot="footer">
                    <button class="btn btn-info text-white" @click="productAddModal = false">Cancel</button>
                    <button class="btn btn-success" @click.prevent="saveProduct()">Save Product</button>
                </div>
            </modal>
            <!--modal designs ends-->

        </div>
    </body>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header">
                            <slot name="header">
                                default header
                            </slot>
                        </div>

                        <div class="modal-body">
                            <slot name="body">
                                default body
                            </slot>
                        </div>

                        <div class="modal-footer border-bottom-primary">
                            <slot name="footer">
                                default footer
                                <button class="modal-default-button" @click="$emit('close')">
                                    OK
                                </button>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>
</html>
