
<!-- 
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->


<?php
		$tital="Home Page";
		include("./shared/anonymousHeader.php");
?>

	<form  class="form-horizontal" action="dashboard.php">
		  <div class="form-group">
			<label  class="Heading" style="font-size:26px;padding-left:20px;">Vu Library Mangamement Login</label>
		  </div>
		  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="inputEmail3" placeholder="Email"></input>
				</div>
		  </div>
		  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="inputPassword3" placeholder="Password"></input>
				</div>
		  </div>
		  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <div class="checkbox">
					<label>
						<input type="checkbox"> Remember me	</input>	</label>
					<label>
						<a href="" style="color:#06c;">forgot your password?</a>
					</label>
				  </div>
				</div>
		  </div>
		  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-default">Sign in</button>
				</div>
		  </div>
	</form>



<?php
    include("./shared/Footer.php");
?>