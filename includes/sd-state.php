<?php 
function sd_state_list(){
	ob_start();
	$state='
	<div class="container">
		<div class="row align-items-center justify-content-center" style="min-height: 100vh;">
			<div class="col-12 p-4" style="max-width: 400px;">
				<h1 class="text-dark text-center my-5" style="font-size: 1.5rem;">States and Local Government Areas in
					Nigeria (Dropdown)</h1>
				<form>
					<div class="form-group">
						<label class="control-label">State of Origin</label>
						<select onchange="toggleLGA(this);" name="state" id="state" class="form-control">
							<option value="" selected="selected">- Select -</option>
							<option value="Abia">Abia</option>
							<option value="Adamawa">Adamawa</option>
							<option value="AkwaIbom">AkwaIbom</option>
							<option value="Anambra">Anambra</option>
							<option value="Bauchi">Bauchi</option>
							<option value="Bayelsa">Bayelsa</option>
							<option value="Benue">Benue</option>
							<option value="Borno">Borno</option>
							<option value="Cross River">Cross River</option>
							<option value="Delta">Delta</option>
							<option value="Ebonyi">Ebonyi</option>
							<option value="Edo">Edo</option>
							<option value="Ekiti">Ekiti</option>
							<option value="Enugu">Enugu</option>
							<option value="FCT">FCT</option>
							<option value="Gombe">Gombe</option>
							<option value="Imo">Imo</option>
							<option value="Jigawa">Jigawa</option>
							<option value="Kaduna">Kaduna</option>
							<option value="Kano">Kano</option>
							<option value="Katsina">Katsina</option>
							<option value="Kebbi">Kebbi</option>
							<option value="Kogi">Kogi</option>
							<option value="Kwara">Kwara</option>
							<option value="Lagos">Lagos</option>
							<option value="Nasarawa">Nasarawa</option>
							<option value="Niger">Niger</option>
							<option value="Ogun">Ogun</option>
							<option value="Ondo">Ondo</option>
							<option value="Osun">Osun</option>
							<option value="Oyo">Oyo</option>
							<option value="Plateau">Plateau</option>
							<option value="Rivers">Rivers</option>
							<option value="Sokoto">Sokoto</option>
							<option value="Taraba">Taraba</option>
							<option value="Yobe">Yobe</option>
							<option value="Zamfara">Zamafara</option>
						</select>
					</div>

					<div class="form-group">
						<label class="control-label">LGA of Origin</label>
						<select name="lga" id="lga" class="form-control select-lga" required>
						</select>
					</div>
				</form>
				<footer class="row mt-5 align-items-center justify-content-center">
					<div class="col-12">
						<p class="text-center">
							Made with <span class="fas fa-heart text-danger"></span> by <a
								href="https://dandigitals.com/" class="">Daniel Abughdyer</a>
						</p>
					</div>
				</footer>
			</div>
		</div>
	</div>


	';
	ob_clean();
}