
<?php require_once "elements/header.php" ?>
<div class="container-fluid">
	<div class="row">
		<!-- Content -->

		<section id="content" class="bg-light">
			<div class="content-wrap pt-lg-0 pt-xl-0 pb-0">
				<div class="container-fluid clearfix">
					<div class="heading-block border-bottom-0 center pt-4 mb-3">
						<h3>Tin tức</h3>
					</div>
					<!-- Posts -->
					<div class="row grid-container infinity-wrapper clearfix align-align-items-start">

						<?php require_once "news.php" ?>
					</div>
				</div>

			</div>
		</section> <!-- #content end -->

		<section class="right-side mb-4">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="box mt-4">
							<h3 class="mb-1">Giá vàng</h3>
							<div class="card card-body" id="box-gold">
								<table class="table table-sm">
									<thead>
										<tr>
											<th><b>Loại vàng</b></th>
											<th><b>Mua vào</b></th>
											<th><b>Bán ra</b></th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>Vàng SJC 1L - 10L</td>
											<td>55.900</td>
											<td>56.450</td>
										</tr>

										<tr>
											<td>Vàng nhẫn SJC 99,99 1 chỉ, 2 chỉ, 5 chỉ</td>
											<td>54.650</td>
											<td>55.200</td>
										</tr>

										<tr>
											<td>Vàng nhẫn SJC 99,99 0,5 chỉ</td>
											<td>54.650</td>
											<td>55.300</td>
										</tr>

										<tr>
											<td>Vàng nữ trang 99,99%</td>
											<td>54.300</td>
											<td>55.000</td>
										</tr>

										<tr>
											<td>Vàng nữ trang 99%</td>
											<td>53.455</td>
											<td>54.455</td>
										</tr>

										<tr>
											<td>Vàng nữ trang 75%</td>
											<td>39.404</td>
											<td>41.404</td>
										</tr>

										<tr>
											<td>Vàng nữ trang 58,3%</td>
											<td>30.218</td>
											<td>32.218</td>
										</tr>

										<tr>
											<td>Vàng nữ trang 41,7%</td>
											<td>21.087</td>
											<td>23.087</td>
										</tr>
									</tbody>
								</table>
								<!-- <div class="text-center">
                                            <div class="spinner-border" style="width: 3rem; height: 3rem;"
                                                role="status">
                                            </div>
                                        </div> -->
							</div>
						</div>
						<div class="box mt-4">
							<h3 class="mb-1">Giá coin</h3>
							<div class="card card-body" id="box-coin">

								<table class="table table-sm">
									<thead>
										<tr>
											<th><b>Name</b></th>
											<th><b>Price (USD)</b></th>
											<th><b>Change (24h)</b></th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>Bitcoin</td>
											<td>$36,809.54</td>
											<td><span class="text-success">2.39%</span></td>
										</tr>

										<tr>
											<td>Ethereum</td>
											<td>$1,327.65</td>
											<td><span class="text-success">7.21%</span></td>
										</tr>

										<tr>
											<td>Tether</td>
											<td>$1.00</td>
											<td><span class="text-success">0.07%</span></td>
										</tr>

										<tr>
											<td>Polkadot</td>
											<td>$16.49</td>
											<td><span class="text-danger">-7.76%</span></td>
										</tr>

										<tr>
											<td>XRP</td>
											<td>$0.29</td>
											<td><span class="text-success">3.87%</span></td>
										</tr>

										<tr>
											<td>Cardano</td>
											<td>$0.37</td>
											<td><span class="text-danger">-5.75%</span></td>
										</tr>

										<tr>
											<td>Litecoin</td>
											<td>$156.90</td>
											<td><span class="text-success">9.28%</span></td>
										</tr>

										<tr>
											<td>Bitcoin Cash</td>
											<td>$520.34</td>
											<td><span class="text-success">7.58%</span></td>
										</tr>

										<tr>
											<td>Chainlink</td>
											<td>$21.84</td>
											<td><span class="text-danger">-6.37%</span></td>
										</tr>

										<tr>
											<td>Stellar</td>
											<td>$0.30</td>
											<td><span class="text-danger">-0.91%</span></td>
										</tr>
									</tbody>
								</table>
								<!-- <div class="text-center">
                                            <div class="spinner-border" style="width: 3rem; height: 3rem;"
                                                role="status">
                                            </div>
                                        </div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php require_once "elements/footer.php" ?>