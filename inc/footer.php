</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<ul>
						<li><a href="#">Tìm hiều trả góp</a></li>
						<li><a href="#">Chính sách bảo hành</a></li>
						<li><a href="#">Chính sách đổi trả</a></li>
						<li><a href="#">Giao hàng và thành toán</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
						<ul>
						<li><a href="about.php">Giới thiệu công ty</a></li>
						<li><a href="faq.php">Tuyển dụng</a></li>
						<li><a href="#">Gửi ý kiến, khiếu nại</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
						<ul>
							<li><a href="contact.php">Gọi mua hàng 18001009	</a></li>
							<li><a href="index.php">  Gọi khiêu nại 18001900</a></li>
							<li><a href="#">Gọi tư vấn 10080099</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
		
						<ul>
							<li><span style="width:300px;font-size:12px">Địa chỉ:26 Thanh Đa phường 27 quận Bình Thạnh TP.Hồ Chí Minh</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow</h4>
					   		  <ul>
							      <li class="facebook"><a href="https://www.facebook.com/bimmm3008" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Project by Trương Định</p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
