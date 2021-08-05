@extends('layout.mainlayout_admin')
@section('content') 
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
            @if (session('success'))
      			    <div class="alert alert-success">
      			        {{ session('success') }}
      			    </div>
      			@endif
			      @if (count($errors) > 0)
	            <div class="alert alert-danger">
	                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <strong>خطا</strong>
	                <ul>
	                    @foreach ($errors->all() as $error)
	     	                <li>{{ $error }}</li>
	                    @endforeach
	                </ul>
	            </div>
	          @endif
        </div>
        <div class="row" id="div1" style="visibility: hidden">
			<div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" 
                                 action="{{route('patient_notifaction')}}" method="POST">
                                @csrf
                               
                            <div class="row form-row">
                            	<div class="parsley-input col-md-6" >
                            		<label>تحديد دكتور او اكثر <span class="tx-danger">*</span></label>

	                                <select class="select" name="device_token[]" multiple data-mdb-filter="true">
                									  <option disabled >حدد دكتور </option>
                									  @foreach ($patients as $_item)
                									  	<option value="{{$_item->device_token}}">
                									  		رقم :{{$_item->id}}  &nbsp; {{$_item->first_name_ar  }} {{$_item->last_name_ar}} 
                									  	</option>
                									  @endforeach
                									</select>
                								</div>
								<div class="parsley-input col-md-6" >
                                    <label>رسالة التنبية <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" name="message" required="" type="text">
                                </div>
							</div>	
							<br>
							<div class="col-12 col-sm-3">
                           		<button type="submit" class="btn btn-primary btn-block">ارسال </button>
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
                                 action="{{route('patient_notifaction')}}" method="POST">
                                @csrf
                          
							<div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">تحديد دكتور او او مجموعه او او الكل </label>
                                        <select name="device_token[]" multiple id="select-beast" class="form-control  nice-select  custom-select">
                                        @foreach ($patients as $_item)
                    									  	<option value="{{$_item->device_token}}">
                    									  		 {{$_item->first_name_ar  }} {{$_item->last_name_ar}} 
                    									  	</option>
                    									  @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="parsley-input col-md-6" >
                                    <label>رسالة التنبية <span class="tx-danger">*</span></label>
                                    <input class="form-control form-control-sm mg-b-20" name="message" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                           		<button type="submit" class="btn btn-primary btn-block">ارسال </button>
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
setTimeout("showIt()", 2500); // after 1 sec

 // after 5 secs
</script>



@endsection

