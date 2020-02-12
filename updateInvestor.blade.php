@extends('layouts.master')
@section('title','Update Profile')
@section('content')
	@if(isset($investor))
		<div class="">
			<h2> <i class="fas fa-user"></i> {{$investor->firstname}} {{$investor->lastname}} Profile </h2>
			<table class="table table-responsive table-borderless">
				<tr>
					<th> Ivestor ID </th>
					<td> {{$investor->user_id}}
				</tr>
				<tr>
					<th> Full Name </th>
					<td> {{$investor->firstname}} {{$investor->middlename}} {{$investor->lastname}}
				</tr>
				<tr>
					<th> Email </th>
					<td> {{$investor->email}}
				</tr>
				<tr>
					<th> ID Details </th>
					<td> {{$investor->typeofid}} <i>{{$investor->idnumber}} </i>
				</tr>
			</table>
			
			<div class="">
				<div class="">
					<h3 class=""><i class="fas fa-file"></i> Document Upload Section</h3>
					<p> Please upload the required document </p>
				</div>
				<div class="mb-2">
					<form method="POST" action="/users/{{$investor->user_id}}/update" enctype="multipart/form-data" class="">
						<div class="">
							@csrf
						</div>
						<div class="row mb-2">
							<label for="documentName" class="col-sm-4">Document Name: </label>
							<div class="col-sm-8">
							<input type="text" name="documentName" id="documentName" placeholder="Document name" class="form-control @error('documentName') is-invalid @enderror" value="{{old('documentName')}}">
								@if($errors->has('documentName'))
									<span class="pt-2 text-danger">
										@foreach($errors->get('documentName') as $error)
											<p> {{$error}}</p>
										@endforeach
									</span>
								@endif
							</div>
						</div>
						<div class="row mb-2">
							<label for="documentUpload" class="col-sm-4"> Upload your document: </label>
							<div class="pt-2 col-sm-8">
								<input type="file" class="" name="uploadDocument" id="uploadDocument"> 
								@if($errors->has('uploadDocument'))
									<span class="text-danger">
										@foreach($errors->get('uploadDocument') as $error)
											<p> {{$error}} </p>
										@endforeach
									</span>
								@endif
							</div>
						</div>
						<div class="">
						 <button type="submit" class="btn btn-lg btn-primary">Submit </button>
						</div>
					</form>
				</div>
					@if($errors->any())
						<div class="p-2">
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
									<p> {{$error}}</p>
								@endforeach
							</div>
						</div>
					
					@endif
				
			</div>
			
		</div>
	@else
		<div> 
			<p> The investor does not exist. </p>
		</div>
	@endif
		
	
@endsection