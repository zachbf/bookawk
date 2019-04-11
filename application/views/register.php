<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="<?php echo base_url();?>auth/login">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" class="active">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form action="<?php echo base_url();?>auth/register" method="post" role="form" style="display: block;">
									<div class="form-group">
                                        <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="">
                                    </div>
									<div class="form-group">
										<input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last Name" value="">
									</div>

									<hr />

									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>

									<hr />

                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
									<div class="form-group">
										<input type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="Mobile Number" value="">
									</div>
									<div class="form-group">
                                        <p><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Suggestion: Use your Aviation Reference Number (ARN) for your username.<br /><br /><span class="glyphicon glyphicon-flag"></span>&nbsp;By registering, you are agreeing to the <a href="#">Data Collection and Privacy Policy</a>.</p>
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" style="width:100%;" class="form-control btn btn-default" value="Register Now">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
