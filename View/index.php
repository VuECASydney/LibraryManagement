<!-- 
Author : Brijender Parta Rana
Date Created:21 August 2015
Date Modified :

-->
<?php
require_once './Shared/Account.php';
redirectPageWithSession();

$title='Home Page';
require_once './Shared/AnonymousHeader.php';
?>
            <script type="text/javascript">
                    function OnSubmitForm()
                    {

                     var username  =document.getElementById("inputEmail3").value ;
                      var pwd  =document.getElementById("inputPassword3").value ;

                      if(username=="Admin" && pwd=="Admin")
                      {
                        document.getElementById("myForm").action ="dashboard.php?role=Admin";
                              // document.myform.submit();
                      }
                      else if (username=="lib" && pwd=="lib")
                      {
                        document.getElementById("myForm").action ="booklist.php?role=lib";
                          //document.myform.submit();
                      }
                      else{

                        document.getElementById("myForm").action ="myaccount.php?role=staff";
                      }
                      return true;
                    }
            </script>
			<!-- <form id='myForm' class="form-horizontal" onsubmit="return OnSubmitForm();"> -->
			<form id='myForm' class="form-horizontal" action="Login.php" method="post">
				<div class="form-group">
					<label class="Heading" style="font-size:26px;padding-left:20px;">Vu Library Mangamement Login</label>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
					<div class="col-sm-10">
						<input type="text"  class="form-control" id="inputEmail3" placeholder="User Name" name="user_id"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="user_password"></input>
					</div>
				</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox">Remember me</input>
								</label>
							<label>
								<a href="" style="color:#06c;">Forgot your password?</a>
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
require_once './Shared/Footer.php';
?>