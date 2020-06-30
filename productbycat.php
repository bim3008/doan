<?php
require_once 'inc/header.php';
if ($_GET['catid'] == '3') {
	$id = $_GET['catid'];
?>
	<div class="main">
		<div class="content">
					<!-- Hiển thị tên Danh Mục Samsung-->
					<div class="content_top">
				<?php
				$show_brand_iphone = $ct->get_brand_iphone($id);
				if ($show_brand_iphone) {
					while ($result_brand_iphone = $show_brand_iphone->fetch_assoc()) {
				?>
						<div class="heading">
							<h3><?php echo $result_brand_iphone['brandName']; ?></h3>
						</div>
				<?php
					}
				}
				?>
				<div class="clear"></div>
			</div>
			<!-- Hiển thị sản phẩm -->

			<div class="section group">
				<?php
				$show_product_iphone = $ct->get_product_iphone($id);
				if ($show_product_iphone) {
					while ($result_iphone = $show_product_iphone->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4 ">
							<a href="details.php?proid=<?php echo $result_iphone['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_iphone['image_product']; ?>" alt="" /></a>
							<h2><?php echo $result_iphone['productName']; ?> </h2>
							<p><?php echo $fm->textShorten($result_samsung['description_product'], 40); ?></p>
							<p><span class="price"><?php echo $fm->formatDollars($result_iphone['price']); ?></span></p>
							<div class="button"><span> <a href="details.php?proid=<?php echo $result_samsung['productId']; ?>" class="details">Chi tiết</a></span></div>
						</div>
				<?php
					}
				}
				?>

			</div>
			<!-- Hiển thị tên Danh Mục Samsung-->
			<div class="content_top">
				<?php
				$show_brand_ss = $ct->get_brand_samsung($id);
				if ($show_brand_ss) {
					while ($result_brand_ss = $show_brand_ss->fetch_assoc()) {
				?>
						<div class="heading">
							<h3><?php echo $result_brand_ss['brandName']; ?></h3>
						</div>
				<?php
					}
				}
				?>
				<div class="clear"></div>
			</div>
			<!-- Hiển thị sản phẩm -->

			<div class="section group">
				<?php
				$show_product_samsung = $ct->get_product_samsung($id);
				if ($show_product_samsung) {
					while ($result_samsung = $show_product_samsung->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4 ">
							<a href="details.php?proid=<?php echo $result_samsung['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_samsung['image_product']; ?>" alt="" /></a>
							<h2><?php echo $result_samsung['productName']; ?> </h2>
							<p><?php echo $fm->textShorten($result_samsung['description_product'], 40); ?></p>
							<p><span class="price"><?php echo $fm->formatDollars($result_samsung['price']); ?></span></p>
							<div class="button"><span> <a href="details.php?proid=<?php echo $result_samsung['productId']; ?>" class="details">Chi tiết</a></span></div>
						</div>
				<?php
					}
				}
				?>

			</div>
			<!-- Hiển thị tên Danh Mục Oppo-->

			<div class="content_top">
				<?php
				$show_brand_oppo = $ct->get_brand_oppo($id);
				if ($show_brand_oppo) {
					while ($result_brand_oppo = $show_brand_oppo->fetch_assoc()) {
				?>
						<div class="heading">
							<h3><?php echo $result_brand_oppo['brandName']; ?></h3>
						</div>
				<?php
					}
				}
				?>
				<div class="clear"></div>
			</div>
			<!-- Hiển thị sản phẩm oppo -->

			<div class="section group">
				<?php
				$show_product_oppo = $ct->get_product_oppo($id);
				if ($show_product_oppo) {
					while ($result_oppo = $show_product_oppo->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4 ">
							<a href="details.php?proid=<?php echo $result_oppo['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_oppo['image_product']; ?>" alt="" /></a>
							<h2><?php echo $result_oppo['productName']; ?> </h2>
							<p><?php echo $fm->textShorten($result_oppo['description_product'], 40); ?></p>
							<p><span class="price"><?php echo $fm->formatDollars($result_oppo['price']); ?></span></p>
							<div class="button"><span> <a href="details.php?proid=<?php echo $result_oppo['productId']; ?>" class="details">Chi tiết</a></span></div>
						</div>
				<?php
					}
				}
				?>

			</div>
			<!-- Hiển thị sản phẩm huawai -->
			<div class="content_top">
				<?php
				$show_brand_huawai = $ct->get_brand_huawai($id);
				if ($show_brand_huawai) {
					while ($result_brand_huawai = $show_brand_huawai->fetch_assoc()) {
				?>
						<div class="heading">
							<h3><?php echo $result_brand_huawai['brandName']; ?></h3>
						</div>
				<?php
					}
				}
				?>
				<div class="clear"></div>
			</div>


			<div class="section group">
				<?php
				$show_product_huawai = $ct->get_product_huawai($id);
				if ($show_product_huawai) {
					while ($result_huawai = $show_product_huawai->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4 ">
							<a href="details.php?proid=<?php echo $result_huawai['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_huawai['image_product']; ?>" alt="" /></a>
							<h2><?php echo $result_huawai['productName']; ?> </h2>
							<p><?php echo $fm->textShorten($result_huawai['description_product'], 40); ?></p>
							<p><span class="price"><?php echo $fm->formatDollars($result_huawai['price']); ?></span></p>
							<div class="button"><span> <a href="details.php?proid=<?php echo $result_huawai['productId']; ?>" class="details">Chi tiết</a></span></div>
						</div>
				<?php
					}
				}
				?>

			</div>
		</div>
	</div>
<?php
}
?>
<!-- ======================================================================= -->
<?php
if ($_GET['catid'] == '4') {
	$id_ipad = $_GET['catid'];
?>
	<div class="main">
		<div class="content">
			<div class="content_top">
				<!-- Hiển thị tên Danh Mục Iphone -->
				<?php
				$show_brand_ipad = $ct->get_brand_ipad($id_ipad);
				if ($show_brand_ipad) {
					while ($result_brand_ipad = $show_brand_ipad->fetch_assoc()) {
				?>
						<div class="heading">
							<h3><?php echo $result_brand_ipad['brandName']; ?></h3>
						</div>
				<?php
					}
				}
				?>
				<div class="clear"></div>
			</div>
			<!-- Hiển thị sản phẩm -->

			<div class="section group">
				<?php
				$show_product_ipad = $ct->get_product_ipad($id_ipad);
				if ($show_product_ipad) {
					while ($result_ipad = $show_product_ipad->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4 ">
							<a href="details.php?proid=<?php echo $result_ipad['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_ipad['image_product']; ?>" alt="" /></a>
							<h2><?php echo $result_ipad['productName']; ?> </h2>
							<p><?php echo $fm->textShorten($result_ipad['description_product'], 40); ?></p>
							<p><span class="price"><?php echo $fm->formatDollars($result_ipad['price']); ?></span></p>
							<div class="button"><span> <a href="details.php?proid=<?php echo $result_ipad['productId']; ?>" class="details">Chi tiết</a></span></div>
						</div>
				<?php
					}
				}
				?>

			</div>


		</div>
	</div>
<?php
}
?>
<!-- ====================================================================== -->
<?php
if ($_GET['catid'] == '5') {
	$id_clock = $_GET['catid'];
?>
	<div class="main">
		<div class="content">
			<div class="content_top">
				<!-- Hiển thị tên Danh Mục đồng hồ casio-->
				<?php
				$show_brand_clock = $ct->get_brand_clock_casio($id_clock);
				if ($show_brand_clock) {
					while ($result_brand_clock = $show_brand_clock->fetch_assoc()) {
				?>
						<div class="heading">
							<h3><?php echo $result_brand_clock['brandName']; ?></h3>
						</div>
				<?php
					}
				}
				?>
				<div class="clear"></div>
			</div>
			<!-- Hiển thị sản phẩm -->

			<div class="section group">
				<?php
				$show_product_clock_casio = $ct->get_product_clock_casio($id_clock);
				if ($show_product_clock_casio) {
					while ($result_clock_casio = $show_product_clock_casio->fetch_assoc()) {
				?>
						<div class="grid_1_of_4 images_1_of_4 ">
							<a href="details.php?proid=<?php echo $result_clock_casio['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_clock_casio['image_product']; ?>" alt="" /></a>
							<h2><?php echo $result_clock_casio['productName']; ?> </h2>
							<p><?php echo $fm->textShorten($result_clock_casio['description_product'], 40); ?></p>
							<p><span class="price"><?php echo $fm->formatDollars($result_clock_casio['price']); ?></span></p>
							<div class="button"><span> <a href="details.php?proid=<?php echo $result_clock_casio['productId']; ?>" class="details">Chi tiết</a></span></div>
						</div>
				<?php
					}
				}
				?>

			</div>
			<!-- RULEX===================================== -->
			<div class="main">
				<div class="content">
					<div class="content_top">
						<!-- Hiển thị tên Danh Mục Đồng hồ Rulex -->
						<?php
						$show_brand_clock_rulex = $ct->get_brand_clock_rulex($id_clock);
						if ($show_brand_clock_rulex) {
							while ($result_brand_clock_rulex = $show_brand_clock_rulex->fetch_assoc()) {
						?>
								<div class="heading">
									<h3><?php echo $result_brand_clock_rulex['brandName']; ?></h3>
								</div>
						<?php
							}
						}
						?>
						<div class="clear"></div>
					</div>
					<!-- Hiển thị sản phẩm -->

					<div class="section group">
						<?php
						$show_product_clock_rulex = $ct->get_product_clock_rulex($id_clock);
						if ($show_product_clock_rulex) {
							while ($result_clock_rulex = $show_product_clock_rulex->fetch_assoc()) {
						?>
								<div class="grid_1_of_4 images_1_of_4 ">
									<a href="details.php?proid=<?php echo $result_clock_rulex['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_clock_rulex['image_product']; ?>" alt="" /></a>
									<h2><?php echo $result_clock_rulex['productName']; ?> </h2>
									<p><?php echo $fm->textShorten($result_clock_rulex['description_product'], 40); ?></p>
									<p><span class="price"><?php echo $fm->formatDollars($result_clock_rulex['price']); ?></span></p>
									<div class="button"><span> <a href="details.php?proid=<?php echo $result_clock_rulex['productId']; ?>" class="details">Chi tiết</a></span></div>
								</div>
						<?php
							}
						}
						?>

					</div>

				<?php
			}
				?>
				<!-- ====================================================================== -->
				<?php
				if ($_GET['catid'] == '6') {
					$id_laptop = $_GET['catid'];
				?>
					<div class="main">
						<div class="content">
							<div class="content_top">
								<!-- Hiển thị tên Danh Mục Laptop macbook-->
								<?php
								$show_brand_laptop_macbook = $ct->get_brand_laptop_macbook($id_laptop);
								if ($show_brand_laptop_macbook) {
									while ($result_brand_laptop_macbook = $show_brand_laptop_macbook->fetch_assoc()) {
								?>
										<div class="heading">
											<h3><?php echo $result_brand_laptop_macbook['brandName']; ?></h3>
										</div>
								<?php
									}
								}
								?>
								<div class="clear"></div>
							</div>
							<!-- Hiển thị sản phẩm -->

							<div class="section group">
								<?php
								$show_product_laptop_macbook = $ct->get_product_laptop_macbook($id_laptop);
								if ($show_product_laptop_macbook) {
									while ($result_laptop_macbook = $show_product_laptop_macbook->fetch_assoc()) {
								?>
										<div class="grid_1_of_4 images_1_of_4 ">
											<a href="details.php?proid=<?php echo $result_laptop_macbook['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_laptop_macbook['image_product']; ?>" alt="" /></a>
											<h2><?php echo $result_laptop_macbook['productName']; ?> </h2>
											<p><?php echo $fm->textShorten($result_laptop_macbook['description_product'], 40); ?></p>
											<p><span class="price"><?php echo $fm->formatDollars($result_laptop_macbook['price']); ?></span></p>
											<div class="button"><span> <a href="details.php?proid=<?php echo $result_laptop_macbook['productId']; ?>" class="details">Chi tiết</a></span></div>
										</div>
								<?php
									}
								}
								?>

							</div>
						</div>
					</div>
					<!-- DELL===================================== -->
					<div class="main">
						<div class="content">
							<div class="content_top">
								<!-- Hiển thị tên Danh Mục Laptop dell-->
								<?php
								$show_brand_laptop_dell = $ct->get_brand_laptop_dell($id_laptop);
								if ($show_brand_laptop_dell) {
									while ($result_brand_laptop_dell = $show_brand_laptop_dell->fetch_assoc()) {
								?>
										<div class="heading">
											<h3><?php echo $result_brand_laptop_dell['brandName']; ?></h3>
										</div>
								<?php
									}
								}
								?>
								<div class="clear"></div>
							</div>
							<!-- Hiển thị sản phẩm -->

							<div class="section group">
								<?php
								$show_product_laptop_dell = $ct->get_product_laptop_dell($id_laptop);
								if ($show_product_laptop_dell) {
									while ($result_laptop_dell = $show_product_laptop_dell->fetch_assoc()) {
								?>
										<div class="grid_1_of_4 images_1_of_4 ">
											<a href="details.php?proid=<?php echo $result_laptop_dell['productId']; ?>"><img class="image_product" style="height:200px;" src="admin/uploads/<?php echo $result_laptop_dell['image_product']; ?>" alt="" /></a>
											<h2><?php echo $result_laptop_dell['productName']; ?> </h2>
											<p><?php echo $fm->textShorten($result_laptop_dell['description_product'], 40); ?></p>
											<p><span class="price"><?php echo $fm->formatDollars($result_laptop_dell['price']); ?></span></p>
											<div class="button"><span> <a href="details.php?proid=<?php echo $result_laptop_dell['productId']; ?>" class="details">Chi tiết</a></span></div>
										</div>
								<?php
									}
								}
								?>

							</div>
						<?php
					}
						?>

						<?php
						require_once 'inc/footer.php';
						?>