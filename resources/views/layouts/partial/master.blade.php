<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@extends('layouts.partial.head')

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{asset('assets/img/logo-small.png')}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            @include('layouts.partial.sidebar')
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        @include('layouts.partial.nav')
        <!-- End Navbar -->
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                name
                            </th>
                            <th>
                                status
                            </th>
                            <th>
                                Updated_at
                            </th>
                            <th>
                                created_at
                            </th>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->user->name}}
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>
                                    {{$order->created_at}}
                                </td>
                                <td >
                                    {{$order->updated_at}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Order address</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                FirstName
                            </th>
                            <th>
                                LastName
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Street Address
                            </th>
                            </thead>
                            <tbody>
                            @foreach($address as $add)
                                <tr>
                                    <td>
                                        {{$add->firstname}}
                                    </td>
                                    <td>
                                        {{$add->lastname}}
                                    </td>
                                    <td>
                                        {{$add->email}}
                                    </td>
                                    <td >
                                        {{$add->phone}}
                                    </td>
                                    <td >
                                        {{$add->city}}
                                    </td>
                                    <td >
                                        {{$add->street_address}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Order Items</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                order ID
                            </th>
                            <th>
                               Product
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>


                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>
                                        {{$item->order_id}}
                                    </td>
                                    <td>
                                        {{$add->product_name}}
                                    </td>
                                    <td>
                                        {{$item->quantity}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.partial.footer')
    </div>
</div>
<!--   Core JS Files   -->
@include('layouts.partial.scripts')
</body>

</html>
