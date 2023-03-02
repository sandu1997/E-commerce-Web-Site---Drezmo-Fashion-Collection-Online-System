<style> 
input[type=text] {
  
  padding: 1px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ebebeb;
}
</style>



	


<div id="profile">
    <section class="contact-section spad">
        <div class="container">
            <div class="contact-title">
                <h4>My Profile</h4>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-text">
                                <span>User Name:</span>
                                <p id="username"></p>
                            </div><br>
                            <div class="ci-text">
                                <span>Name:</span>
                                <p>First name: <input  type="text" id="name_first"></p>
                                <p>Last name: <input type="text" id="name_last"></p>
                            </div><br>
                            <div class="ci-text">
                                <span>NIC:</span>
                                <p id="nic"></p>
                            </div><br>
                            <div class="ci-text">
                                <span>Telephone:</span>
                                <p><input type="text" id="tp"></p>
                            </div><br>
                        
                            <div class="ci-text">
                                <span>Address:</span>
                                <p><input type="text" id="address_no"></p>
                                <p><input type="text" id="address_street"></p>
                                <p><input type="text" id="address_town"></p>
                            </div><br>
                            
                            <div class="ci-text">
                                <span>Country:</span>
                                <p id="country"></p>
                            </div><br>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p id="email"></p>
                            </div><br>
                            <div class="ci-text">
                                <p style="color: red" id="updatedstatus"></p>
                            </div><br>
                            <div class="ci-text">
                                <button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #e7ab3c;margin-left: 30px;" onclick="updateuser()">Save</button> 
                                <button style="border: none;color: white;padding: 15px 32px;text-align: center;background-color: #b3000f;margin-left: 30px;" onclick="deleteuser()">Delete Account</button>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>








	

		


<script>
	
	$(document).ready(user);
	function user() {
		$.ajax({
			//url: "../DAO/userDAO.php",
			url: "http://localhost/projects/Drezmo/DAO/userDAO.php",
			dataType:"JSON",
			success:function(data){
				$('#username').html(data.username);
				$('#nic').html(data.nic);
				$('#country').html(data.user_country);
				$('#email').html(data.email);
				
				
				document.getElementById("name_first").value =(data.name_first);
				document.getElementById("name_last").value = (data.name_last);
				document.getElementById("address_no").value = (data.address_no);
				document.getElementById("address_street").value = (data.address_street);
				document.getElementById("address_town").value = (data.address_town);
				document.getElementById("tp").value = (data.tp);
			}
		})
		return false;
	}
	
	function updateuser() {
		var fname = document.getElementById("name_first").value ;
		var lname = document.getElementById("name_last").value;
		var adrno = document.getElementById("address_no").value;
		var adrstreet = document.getElementById("address_street").value;
		var adrtown = document.getElementById("address_town").value;
		var tpno = document.getElementById("tp").value;
		$.ajax({
			url: "http://localhost/projects/Drezmo/DAO/userDAO.php",
			data: {
				fname: fname,
				lname: lname,
				adrno: adrno,
				adrstreet: adrstreet,
				adrtown: adrtown,
				tpno: tpno
			},
			success:function(data){
				$(document).ready(user);
				$("#updatedstatus").html('Updated successful!');
				
			}
		})
		return false;
	}
	
	function deleteuser() {
		if (confirm("Are You sure to delete your account!")) {
			window.location.href = "index.php";
			$.ajax({
				url: "http://localhost/projects/Drezmo/DAO/userDAO.php",
				data: {
					deleteuser: deleteuser
				},
				success:function(data){
					//window.location.href = "index.php";
					
				}
			})
			return false;
		}
	}
	 
</script>

