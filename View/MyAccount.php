<?php
/**
 * Author : Brijender Parta Rana
 * Date Created : 21 August 2015
 * Date Modified : 
 */

		$title = 'My Account';
		require_once './Shared/Header.php';
?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             My Account
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2">ID</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><?php echo $user->getId(); ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Name</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><?php echo $user->getName(); ?></p>
                                </div>
                            </div>
                            <div class="form-group">
							    <label class="control-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><?php echo $user->getAddress(); ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Phone</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><?php echo $user->getPhone(); ?></p>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static"><?php echo $user->getEmail(); ?></p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
<?php
	require_once './Shared/Footer.php';
?>