
<?php $__env->startSection('content'); ?>	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								
								<h3 class="page-title">الاعدادات</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الاعدادات</li>
								</ul>
								<?php if(session()->has('message')): ?>
	                            <?php echo $__env->make('admin.includes.alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	                            <?php endif; ?>
	                            <?php if(Session::has('error')): ?>
	                               <div class="row mr-2 ml-2" >
	                                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
	                                       <?php echo e(Session::get('error')); ?>

	                                    </button>
	                                </div>
	                            <?php endif; ?> 
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						
						<div class="col-12">
								<div class="card">
									<div class="card-body">
										<form action="<?php echo e(url('settings/privacy')); ?>" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                <?php echo csrf_field(); ?>
											<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
											
											<div class="form-group">
												<label>privacy</label>
												<input type="text" name="privacy_ar" class="form-control" value="<?php echo e($contactInfo->privacy_ar); ?>">
											</div>
											<div class="form-group">
												<label>privacy</label>
												<input type="text" name="privacy_en" class="form-control" value="<?php echo e($contactInfo->privacy_en); ?>">
											</div>
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
										</form>
									</div>
								</div>
						</div>
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rt/resources/views/admin/settings/privacy.blade.php ENDPATH**/ ?>