@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">البنرات</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">البنرات</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة بنر جديد</a>
							</div>
						</div>
							@if(session()->has('message'))
                            @include('admin.includes.alerts.success')
                            @endif
                            @if ($errors->any())
						      <div class="alert alert-warning">
						        <ul>
						          @foreach ($errors->all() as $error)
						          <li>{{ $error }}</li>
						          @endforeach
						        </ul>
						      </div>
						      @endif
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									



									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>#</th>
													<th>البنر</th>										
													<th class="text-right">أكشن</th>
												</tr>
											</thead>
											<tbody>
												
											@foreach ($pannars as $_item)
												<tr>
													<td>{{ $_item->id }}</td>
												
													<td>
														<a href="profile" class="avatar avatar-sm mr-2">
															<img class="avatar-img" src="{{asset('assets_admin/img/pannars/'.$_item->pannar) }}" alt="Speciality">
														</a>
													</td>
												
													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" 
															data-pannar ="{{ $_item->pannar }}" 
															
															data-catid="{{ $_item->id }}" 
															data-target="#edit">
																<i class="fe fe-pencil"></i> تعديل
															</a>
															<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> حذف
															</a>
															
                                                       
                                                    </span>
														</div>
													</td>
												</tr>
											@endforeach
												
											</tbody>
		                                    
		                                </table>
		                            </div>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة بنر</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('pannars.store')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>بنر</label>
											<input type="file"  name="pannar" class="form-control" value="{{old('pannar')}}">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل البنر</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="{{route('pannars.update','test')}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                               
								<div class="row form-row">
									<input type="hidden" name="id" id="cat_id" >
									<input type="hidden" name="url" id="pannar">
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البنر</label>
											<input type="file" name="pannar"  class="form-control"  >
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل متزكد من حذف هذا العنصر</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('pannars.destroy','test')}}">
	                                   		 @csrf
	                                         @method('delete')
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
	                                    </form>
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->



        </div>
		<!-- /Main Wrapper -->


		<script src="{{asset('js/app.js')}}"></script>

<script>

  
    $('#edit').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var pannar = button.data('pannar') 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #pannar').val(pannar);
  
      modal.find('.modal-body #cat_id').val(cat_id);
    })


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>
@endsection