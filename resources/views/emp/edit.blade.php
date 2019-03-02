@extends('layouts.master')

@section('content')
	<h3 class="mb-5">Edit Employee</h3>

	<form>
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" name="first_name" id="first_name" class="form-control" value="{{$employee->first_name}}">
				</div>

				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" name="last_name" id="last_name" class="form-control" value="{{$employee->last_name}}">
				</div>

				<div class="form-group">
					<label for="middle_name">Middle Name</label>
					<input type="text" name="middle_name" id="middle_name" class="form-control" value="{{$employee->middle_name}}">
				</div>

				<div class="form-group">
					<label for="birthday">Birth date</label>
					<input type="date" name="birthday" id="birthday" class="form-control" value="{{empty($employee->birthday)?'': $employee->birthday}}">
				</div>

				<div class="form-group">
					<label for="gender">Gender</label>
					<select class="form-control" id="gender" name="gender" value="{{$employee->gender}}">
						<option selected disabled>Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
				</div>

				<div class="form-group">
					<label for="marital_status">Marital Status</label>
					<input type="text" name="marital_status" id="marital_status" class="form-control" value="{{$employee->marital_status}}">
				</div>

				<div class="form-group">
					<label for="position">Position</label>
					<input type="text" name="position" id="position" class="form-control" value="{{$employee->position}}">
				</div>

				<div class="form-group">
					<label for="date_hired">Date Hired</label>
					<input type="date" name="date_hired" id="date_hired" class="form-control" value="{{empty($employee->date_hired)?'': $employee->date_hired}}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group" id="contactGroup">
					<label for="contact_info">Contact Info</label>
					<span><a href="#" id="addContactField">[+]</a></span>
					<span style="position: absolute;right: 20px;">Primary?</span>
					<?php $contacts = explode(',', $employee->contact_info);?>
					@foreach($contacts as $contact)
					<div class="row">
						<div class="col-md-10 col-sm-10">
							<input type="text" name="contact_info" class="form-control contact_info" value="{{ $employee->primary_contact }}">
						</div>
						<div class="col-md-2 col-sm-2">
							<input type="checkbox" class="contact_list"name="contact" checked>
							<span class="ml-3 removeContact" style="color: salmon;cursor: pointer;">X</span>
						</div>
					</div>
					@endforeach
				</div>

				<div class="form-group" id="addressGroup">
					<label for="address_info">Address Info</label>
					<span><a href="#" id="addAddressField">[+]</a></span>
					<span style="position: absolute;right: 20px;">Primary?</span>
					<!-- <?php $addresses = explode(',', $employee->address_info);?>
					@foreach($addresses as $address) -->
					<div class="row">
						<div class="col-md-10 col-sm-10">
							<input type="text" name="address_info" class="form-control address_info" value="{{ $employee->primary_address }}">
						</div>
						<div class="col-md-2 col-sm-2">
							<input type="checkbox" class="address_list" name="address" checked>
							<a href="#" class="ml-3 removeAddress">X</a>
						</div>
					</div>
					<!-- @endforeach -->
				</div>
			</div>

		<button type="button" class="btn btn-primary mt-1" id="update" data-id="{{$employee->id}}">Save</button>
	</form>
@endsection
