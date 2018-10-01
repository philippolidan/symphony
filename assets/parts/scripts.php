</body>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.smartWizard.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/validator.min.js"></script>
<script type="text/javascript" src="assets/js/select2.min.js"></script>
<script type="text/javascript" src="assets/js/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/js/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/js/datatables.min.js"></script>
<script type="text/javascript" src="assets/js/chart.min.js"></script>
<script type="text/javascript" src="assets/js/pnotify.custom.min.js"></script>
<?php
	if(isset($_SESSION['role_id']))
		$role_id = $_SESSION['role_id'];
	else
		$role_id = 0;
?>
<script type="text/javascript">
	$.fn.extend({
		animateCss: function(animationName, callback) {
			var animationEnd = (function(el) {
				var animations = {
					animation: 'animationend',
					OAnimation: 'oAnimationEnd',
					MozAnimation: 'mozAnimationEnd',
					WebkitAnimation: 'webkitAnimationEnd',
				};

				for (var t in animations) {
					if (el.style[t] !== undefined) {
						return animations[t];
					}
				}
			})(document.createElement('div'));

			this.addClass('animated ' + animationName).one(animationEnd, function() {
				$(this).removeClass('animated ' + animationName);

				if (typeof callback === 'function') callback();
			});

			return this;
		},
	});

	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
		});
	});
	function notification(role_id = 0){
		console.log(role_id);
		$.ajax({
			url:"assets/includes/notification_handler.php",
			type:"POST",
			data:{id:1,role_id:role_id},
			success: function(data){
				if(data != false){
		  			var data1= JSON.parse(data);
		  			if(data1.length > 0){
		  				new PNotify({
		  					title: data1[0][0],
		  					text: data1[0][1],
		  					type: 'info',
		  					delay: 4000
		  				});
		  			}
				}
			}
		});
		setTimeout(function(){
			notification("<?php echo $role_id?>");
		},2000);
	}
	notification("<?php echo $role_id?>");
</script>