
			<div class="row">
				<div class="col-lg-12">
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>  All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo base_url()?>/template/front/js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/js/popper.js"></script>
	<script src="<?php echo base_url()?>/template/front/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/isotope/isotope-min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/flipclock/timer.js"></script>
	<script src="<?php echo base_url()?>/template/front/vendors/counter-up/jquery.counterup.js"></script>
	<script src="<?php echo base_url()?>/template/front/js/mail-script.js"></script>
	<script src="<?php echo base_url()?>/template/front/js/custom.js"></script>
	<script src="<?php echo base_url()?>/template/front/js/datatables.min.js"></script>
	
    <script type="text/javascript" src="<?php echo base_url()?>/template/front/cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>    <script type="text/javascript">toastr.options = {"closeButton":true,"closeClass":"toast-close-button","closeDuration":300,"closeEasing":"swing","closeHtml":"<button><i class=\"icon-off\"><\/i><\/button>","closeMethod":"fadeOut","closeOnHover":true,"containerId":"toast-container","debug":false,"escapeHtml":false,"extendedTimeOut":10000,"hideDuration":1000,"hideEasing":"linear","hideMethod":"fadeOut","iconClass":"toast-info","iconClasses":{"error":"toast-error","info":"toast-info","success":"toast-success","warning":"toast-warning"},"messageClass":"toast-message","newestOnTop":false,"onHidden":null,"onShown":null,"positionClass":"toast-top-right","preventDuplicates":true,"progressBar":true,"progressClass":"toast-progress","rtl":false,"showDuration":300,"showEasing":"swing","showMethod":"fadeIn","tapToDismiss":true,"target":"body","timeOut":5000,"titleClass":"toast-title","toastClass":"toast"};</script>		<script>
		$("#buktitransfer").click(function(){
			$("#bukti_transfer").click();
		});

		$("#bukti_transfer").change(function(){
			let filename = $("#bukti_transfer").val().split("\\").pop();
			$("#buktitransfer").val(filename);
		});

		$(window).scroll(function(){
			var scrollPos = $(document).scrollTop();
			$('#navbar a').each(function () {
				var currLink = $(this);
				if(currLink.attr("href") != "http://donasi.ham.di/login"){
					var refElement = $(currLink.attr("href"));
					if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
						$('#navbar ul li').removeClass("active");
						currLink.parent().addClass("active");
					}
					else{
						currLink.removeClass("active");
					}
				}
			});
		});

		$(document).ready(function(){
			$("#tabel").DataTable();
			$("#tabel2").DataTable();
		});

		function invalidMsg(textbox){
			if (textbox.value === '') { 
				textbox.setCustomValidity('Mohon form ini untuk diisi'); 
			} else if (textbox.validity.typeMismatch) { 
				textbox.setCustomValidity('Mohon Masukkan input sesuai dengan jenis form'); 
			} else { 
				textbox.setCustomValidity(''); 
			} 
       return true; 
		}

	</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXbtfCjBCkSURgu2AYpS%2fs8C8ORsvVG7ntPYWRSRZA3WCs0XDd%2fvRdfTKUFWOtsn3q0KA0U1FFRitFm5rLQihCFPSNPkwLNBTbVZHUAnYc5iRYaWz9emGf9m5PCwpwb1EG9XyJgwVosLWYX7URUBcFDz%2fmkdkyV5mTrMqdgR23F6Q%2bmoCJTJdkYhMn%2fjJndhXBybQyOe3UYxAoORyLyKPPFU2F4JZbR%2f%2fGf9m5PCwpwb1EG9XyJgwVosLWYX7URUBcFe0fIUwOycquAWCEr73a%2bkZ7pkMdQXNq6mn7%2bwiGszc6LS%2bjfamaBEyH9QVRUD%2b7TjeimGf9m5PCwpwb1EG9XyJgwVosLWYX7URUBcFl4tM%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


</html>