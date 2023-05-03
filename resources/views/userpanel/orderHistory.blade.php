@extends('layouts.app')
@include('partials.navigationUser',['history' => "nav-selected"])

<title>Customer | Order History</title>
    <main class="container py-5" style="margin-top:-49px !important">
        <div class="mt-4">
          <h2 class="" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">ORDER HISTORY</h3>
        </div>
        <div class="main-wrapper" style=" max-width:">
    
            <section class="search-filter-container mb-4">
    
                <div class="top-container1" style="max-width: 800px; margin-top: 15px">
                    <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="background-color: white">
                        <span class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
    
    
            </section>
    
            <div class="mt-2">
                @include('flash-message')
            </div>
    
    
            <div class="table-container">
                <table class="table table-striped history-table border border-2 shadow">
                    <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Pickup</th>
                        <th scope="col">Dropoff</th>
                        <th scope="col">Parcel Size&Width</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Delivered Date</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody class="history-tbody">
                        
                            
                                <tr>
                                    <td>69</td>
                                    <td><img src="/img/order_image.png" alt="item-image"></td>  
                                    <td>503 Boni Ave. cor San Rafael Street, Mandaluyong City, Philippines</td>
                                    <td>503 Boni Ave. cor San Rafael Street, Mandaluyong City, Philippines</td>
                                    <td>17x30x41 | 97 kg</td>
                                    <td>August 02, 2023</td>
                                    <td>August 25, 2023</td>
                                    <td class="" style="overflow:auto;">                                
                                        <label class="status-deliveredv2">
                                            Delivered
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                  <td>69</td>
                                  <td><img src="/img/order_image.png" alt="item-image"></td>  
                                  <td>503 Boni Ave. cor San Rafael Street, Mandaluyong City, Philippines</td>
                                  <td>503 Boni Ave. cor San Rafael Street, Mandaluyong City, Philippines</td>
                                  <td>17x30x41 | 97 kg</td>
                                  <td>August 02, 2023</td>
                                  <td>August 25, 2023</td>
                                  <td class="" style="overflow:auto;">                                
                                        <label class="status-canceledv2">
                                            Canceled
                                        </label>
                                  </td>
                              </tr>
                              
                              
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>


@include('partials.footer')	
