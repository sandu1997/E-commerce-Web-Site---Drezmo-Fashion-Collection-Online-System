<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>




	
	
<section class="shopping-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Transections</h4>
				<br><br>
				Enter Month: <input type="month" id="month" name="bdaymonth">
				<button onclick="transections()">Ok</button>
				<br><br>
				<div id="table"></div>
			</div>
		</div>
	</div>
</section>
		


<script>

	

	//$(document).ready(transections);
	
	function transections(){
		var month= document.getElementById("month").value;
		$.ajax({

			url: "../DAO/transectionsDAO.php",
			data: {
				month: month
			},
			success:function(data){
				
				$("#table").html(data);
			}
		})
		return false;
	}

	
</script>









<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.zoom.min.js"></script>
    <script src="../js/jquery.dd.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>