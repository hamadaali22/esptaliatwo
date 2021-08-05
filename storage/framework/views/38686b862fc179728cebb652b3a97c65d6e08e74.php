<?php $__env->startSection('content'); ?> 
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid" >
        
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                        مستخدم</span>
                </div>
            </div>
            <?php if(session('success')): ?>
			    <div class="alert alert-success">
			        <?php echo e(session('success')); ?>

			    </div>
			<?php endif; ?>
			<?php if(count($errors) > 0): ?>
	            <div class="alert alert-danger">
	                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <strong>خطا</strong>
	                <ul>
	                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	     	                <li><?php echo e($error); ?></li>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </ul>
	            </div>
	        <?php endif; ?>
        </div>
        <div class="row" id="div1" style="visibility: hidden">
			<div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" 
                                 action="<?php echo e(route('send_notifaction')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                               
                            <div class="row form-row">
                            	<div class="parsley-input col-md-6" >
                            		<label>تحديد دكتور او اكثر <span class="tx-danger">*</span></label>

	                                <select class="select" name="doctorId[]" multiple data-mdb-filter="true">
									  <option disabled >حدد دكتور </option>
									  <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  	<option value="<?php echo e($_item->id); ?>">
									  		رقم :<?php echo e($_item->id); ?>  &nbsp; <?php echo e($_item->first_name_ar); ?> <?php echo e($_item->last_name_ar); ?> 
									  	</option>
									  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
								<div class="parsley-input col-md-6" >
                                    <label>رسالة التنبية <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" name="message" required="" type="text">
                                </div>
							</div>	
							<br>
							<div class="col-12 col-sm-3">
                           		<button type="submit" class="btn btn-primary btn-block">حفظ </button>
                       		</div>	
							
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <div class="row">
   			<div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" 
                                 action="<?php echo e(route('send_notifaction')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                          
							<div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">تحديد دكتور او او مجموعه او او الكل </label>
                                        <select name="Status" multiple id="select-beast" class="form-control  nice-select  custom-select">
                                         <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  	<option value="<?php echo e($_item->id); ?>">
									  		 <?php echo e($_item->first_name_ar); ?> <?php echo e($_item->last_name_ar); ?> 
									  	</option>
									  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="parsley-input col-md-6" >
                                    <label>رسالة التنبية <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" name="message" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                           		<button type="submit" class="btn btn-primary btn-block">حفظ </button>
                       		</div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  



<script type="text/javascript">
function showIt() {
  document.getElementById("div1").style.visibility = "visible";
}
setTimeout("showIt()", 3000); // after 1 sec

 // after 5 secs
</script>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.mainlayout_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/template-rt/resources/views/admin/sendnotification/doctorsend.blade.php ENDPATH**/ ?>