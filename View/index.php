<?php
/**
 * Author : Brijender Parta Rana, Choongyeol Kim
 * Date Created : 21 August 2015
 * Date Modified : 
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/Classes/Entity/Account.php';
//redirectPageWithSession();

$title='Home Page';
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/AnonymousHeader.php';
?>
            <script type="text/javascript">
                    function OnSubmitForm()
                    {
                     var username  =document.getElementById("inputEmail3").value ;
                      var pwd  =document.getElementById("inputPassword3").value ;

                      if(username=="Admin" && pwd=="Admin")
                      {
                        document.getElementById("myForm").action ="DashBoard.php?role=Admin";
                              // document.myform.submit();
                      }
                      else if (username=="lib" && pwd=="lib")
                      {
                        document.getElementById("myForm").action ="BookList.php?role=lib";
                          //document.myform.submit();
                      }
                      else{

                        document.getElementById("myForm").action ="MyAccount.php?role=staff";
                      }
                      return true;
                    }
            </script>
			<!-- <form id='myForm' class="form-horizontal" onsubmit="return OnSubmitForm();"> -->
			<form id='myForm' class="form-horizontal" action="Login.php" method="post">
				<div class="form-group">
					<label class="Heading" style="font-size:26px;padding-left:20px;">VU Library Mangamement Login</label>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
					<div class="col-sm-10">
						<input type="text" class="form-control"  name="user_id"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" placeholder="Password" name="user_password"></input>
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
                 <!-- #messages is where the messages are placed inside -->
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <div id="messages"></div>
                    </div>
                </div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/LibraryManagement/View/Shared/Footer.php';
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#myForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            user_id: {
                validators: {
                    notEmpty: {
                        message: 'The User Id is required and cannot be empty'
                    }
                }
            } ,
            user_password: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    }
                }
            }

         }

    });
});
</script>