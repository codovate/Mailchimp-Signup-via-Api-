<div id="wrapper" class="cf">
			
		<div class="standardP">

			<div class="standardPText">		
				<?php
				$input = array();
				$message = "";
				$validation_message = "";

				if(isset($_POST) && !empty($_POST)) {

					$input = $_POST;
					if (empty($input['g-recaptcha-response']) ) {
						$message = "Please solve the recaptcha below";
					}

					 else {

			       	 	$filtered_data = filter_var_array($input, array(
			       	 	    'email' => FILTER_VALIDATE_EMAIL,
			       	 	    'firstname' => FILTER_SANITIZE_STRING,
			       	 	    'lastname' => FILTER_SANITIZE_STRING,
			       	 	));


			       	 	if(empty($filtered_data['code']) || empty($filtered_data['email']) || empty($filtered_data['firstname']) || empty($filtered_data['lastname'])) {
			       	 		$message = "You have to fill up all the required fields";
			       	 	} 
			       	 	else {

				       	 	$filtered_data['date_entry'] = date('Y-m-d H:i:s');
	
				       		//add mailchimp signup form. 
	
				       	}
			        }
				}
				
				if($validation_message) {
					?><p class="validation"><?php echo $validation_message; ?></p><?php
				} else {

					if($message) {
						?><p class="error"><?php echo $message; ?></p><?php
					}
					?>
					<h3> Sign up to our Newsletter 
					<form method="post" id="competition_form">
						<h3>Email Address*</h3>
						<p><input type="text" name="email" value="<?php if(isset($input['email'])) { echo $input['email']; } ?>" required ></p>
						<h3>First Name*</h3>
						<p><input type="text" name="firstname" value="<?php if(isset($input['firstname'])) { echo $input['firstname']; } ?>" required></p>
						<h3>Last Name*</h3>
						<p><input type="text" name="lastname" value="<?php if(isset($input['lastname'])) { echo $input['lastname']; } ?>" required ></p>


						<p class="competition_terms"><em>*required fields</em></p>
						<div class="g-recaptcha" data-sitekey="6LfGzwgTAAAAABLwkq7a9evKJnMMPJr6ofCMUbyw"></div>   
						<p class="submit-container"><input type="submit" value="Submit"></p>
					</form>
					<?php
				}
				?>


			</div><!-- .standardPText -->	
		</div><!-- .standardP-->
		
		
					
	</div><!-- #wrapper -->