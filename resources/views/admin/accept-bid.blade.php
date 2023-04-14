	@include('partials/admin-nav')

	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style>
    .primary {
      background-color: #214D94;
      color: white;
    }
    body{
      font-family: 'Poppins';
    }
		.info {
			color: #214D94;
		}
		img {
			max-width: 100%;
			height: auto;
		}
  </style>

	<div class="container-fluid py-3">
    <div style="max-width: 100%;">
        <div class="p-4" style="background-color: #EAEBEE;">
          <h3 class="text-dark mb-0">TELEVISION</h3>
					<hr class="opacity-75">
					<card class="card bg-white btn-wrapper p-4 shadow-lg">
						<!-- Sender and Receiver-->
						<div class="row">
							<div class="row py-2">
								<div class="col-sm-6">
								<h5 class="fw-normal">SENDER</h5>
								</div>
								<div class="col-sm-5 ps-0">
								<h5 class="fw-normal">RECEIVER</h5>
								</div>
							</div>
							<div class="col-sm-10">
								<div class="row py-2">
									<div class="col-sm-3">
										<div>Name:</div>
										<div>Address:</div>
										<div>Contact Number:</div>
									</div>
									<div class="col-sm-4 info">
										<div>irYs Hope</div>
										<div>California</div>
										<div>0999-999-9999</div>
									</div>
									<div class="col-sm-3 ">
										<div>Name:</div>
										<div>Address:</div>
										<div>Contact Number:</div>
									</div>
									<div class="col-sm-2 info">
										<div>Moom Nanashi</div>
										<div>Australia</div>
										<div>0999-999-9999</div>
									</div>
								</div>
								<hr class="opacity-75">
								<h5 class="fw-normal">PARCEL INFORMATION</h5>
								<div class="row">
									<div class="col-sm-3">
										<div>ID:</div>
										<div>SIZE & WEIGHT:</div>
									</div>
									<div class="col-sm-4 info">
										<div>68</div>
										<div>17x30x41 | 97kg</div>
									</div>
									<div class="col-sm-3 ">
										<div>CATEGORY:</div>
										<div>MODE OF PAYMENT:</div>
									</div>
									<div class="col-sm-2 info">
										<div>Appliances</div>
										<div>COD</div>
									</div>
								</div>
							</div>
							<!-- End -->
							<!-- Image and Button -->
							<div class="col-sm-2">
								<div class="row pb-2 rounded">
									<div><img src="img/television.png" class="rounded" alt="television"></div>
								</div>
								<div class="row pb-2">
									<div><button type="button" class="btn btn-primary primary btn-block shadow-0">
										Track Item</button></div>
								</div>
							</div>
						<!-- End -->
						</div>
						<hr class="opacity-75">
						<!-- table starts here -->
						<section class="mb-5 overflow-auto">
                    <table class="table table-striped table-hover">
                    <thead class="text-white" style="background-color: #214D94;">
                        <tr class="text-warning">
                            <th>COMPANY</th>
                            <th>BID AMOUNT</th>
                            <th>DATE</th>
                            <th> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>HART MORRINS ASSOCIATE</td>
                            <td>169</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                        <tr>
                            <td>HART MORRINS ASSOCIATE 2</td>
                            <td>269</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                        <tr>
                            <td>HART MORRINS ASSOCIATE 3</td>
                            <td>369</td>
														<td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                        <tr>
                            <td>HART MORRINS ASSOCIATE 4</td>
                            <td>120</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>

                    </tbody>
                    </table>
                </section>

					</card>
        </div>
				
		</div>

	</div>

		
	</div>