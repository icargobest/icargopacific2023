<!-- Darren -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatcher Company</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <!-- eto yung code sa breadcrumbs sa waybill tracking
    <div class="position-relative m-4">
        <div class="progress" style="height: 1px;">
            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
        <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
        <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
    </div> -->

    <div class="container d-flex align-items-center">
        <div class="mx-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">ID</th>
                        <th scope="col" width="15%">PHOTO</th>
                        <th scope="col">PICKUP</th>
                        <th scope="col">DROPOFF</th>
                        <th scope="col">PARCEL ITEM</th>
                        <th scope="col">PARCEL SIZE&WIDTH</th>
                        <th scope="col">TOTAL AMOUNT</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">DRIVER</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)
                    
                    <tr>
                        <td>26</td>
                        <td>PHOTO</td>
                        <td>John Doe<br>Binan City</td>
                        <td>Muntinlupa City</td>
                        <td>TOOLS</td>
                        <td>17x30x41 | 97 kg</td>
                        <td>300</td>
                        <td>Processing</td>
                        <td><a href="/company/{{ $driver->id }}">DRIVER</a>
                            <!-- or you can include a Blade partial -->
                            @include('company.dispatcher-driver', ['driver' => $driver])</td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>