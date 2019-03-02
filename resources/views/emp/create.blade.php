@extends('layouts.master')

@section('content')
	<h3 class="mb-5">Add Employee</h3>

	<form>
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name')}}">
					@if($errors->has('first_name'))
						<small class="text-danger">{{$errors->first('first_name')}}</small>
					@endif
				</div>

				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name')}}">
					@if($errors->has('last_name'))
						<small class="text-danger">{{$errors->first('last_name')}}</small>
					@endif
				</div>

				<div class="form-group">
					<label for="middle_name">Middle Name</label>
					<input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ old('middle_name')}}">
					@if($errors->has('middle_name'))
						<small class="text-danger">{{$errors->first('middle_name')}}</small>
					@endif
				</div>

				<div class="form-group">
					<label for="birthday">Birth date</label>
					<input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday')}}">
					@if($errors->has('birthday'))
						<small class="text-danger">{{$errors->first('birthday')}}</small>
					@endif
				</div>

				<div class="form-group">
					<label for="gender">Gender</label>
					<select class="form-control" id="gender" name="gender">
						<option selected disabled>Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
				</div>

				<div class="form-group">
					<label for="marital_status">Marital Status</label>
					<input type="text" name="marital_status" id="marital_status" class="form-control" value="{{ old('marital_status')}}">
				</div>

				<div class="form-group">
					<label for="position">Position</label>
					<input type="text" name="position" id="position" class="form-control" value="{{ old('position')}}">
				</div>

				<div class="form-group">
					<label for="date_hired">Date Hired</label>
					<input type="date" name="date_hired" id="date_hired" class="form-control" value="{{ old('date_hired')}}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group" id="contactGroup">
					<label for="contact_info">Contact Info</label>
					<span><a href="#" id="addContactField">[+]</a></span>
					<span style="position: absolute;right: 20px;">Primary?</span>
					<div class="row">
						<div class="col-md-10 col-sm-10">
							<input type="text" name="contact_info" class="form-control contact_info" value="{{ old('contact_info')}}">
						</div>
						<div class="col-md-2 col-sm-2">
							<input type="checkbox" class="contact_list"name="contact">
							<span class="ml-3 removeContact" style="color: salmon;cursor: pointer;">X</span>
						</div>
					</div>
				</div>

				<div class="form-group" id="addressGroup">
					<label for="address_info">Address Info</label>
					<span><a href="#" id="addAddressField">[+]</a></span>
					<span style="position: absolute;right: 20px;">Primary?</span>
					<div class="row">
						<div class="col-md-10 col-sm-10">
							<input type="text" name="address_info" class="form-control address_info">
						</div>
						<div class="col-md-2 col-sm-2">
							<input type="checkbox" class="address_list" name="address">
							<a href="#" class="ml-3 removeAddress">X</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<button type="button" id="store" class="btn btn-primary mt-1" >Save</button>
	</form>
@endsection
