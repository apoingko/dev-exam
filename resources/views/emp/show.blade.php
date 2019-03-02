@extends('layouts.master')

@section('content')
	<h3 class="mb-5">Employee info</h3>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" disabled>
				</div>

				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" disabled>
				</div>

				<div class="form-group">
					<label for="middle_name">Middle Name</label>
					<input type="text" name="middle_name" class="form-control" value="{{ $employee->middle_name }}" disabled>
				</div>

				<div class="form-group">
					<label for="birthday">Birth date</label>
					<input type="text" name="birthday" class="form-control" value="{{empty($employee->birthday)?'': date('F d, Y',strtotime($employee->birthday))}}" disabled>
				</div>

				<div class="form-group">
					<label for="gender">Gender</label>
					<input type="text" name="gender" class="form-control" value="{{ $employee->gender }}" disabled>
				</div>

				<div class="form-group">
					<label for="marital_status">Marital Status</label>
					<input type="text" name="marital_status" class="form-control" value="{{ $employee->marital_status }}" disabled>
				</div>

				<div class="form-group">
					<label for="position">Position</label>
					<input type="text" name="position" class="form-control" value="{{ $employee->position }}" disabled>
				</div>

				<div class="form-group">
					<label for="date_hired">Date Hired</label>
					<input type="text" name="date_hired" class="form-control" value="{{empty($employee->birthday)?'': date('F d, Y',strtotime($employee->date_hired))}}" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="contact_info">Contact Info</label>
					<!-- <?php $contacts = explode(',', $employee->contact_info);?>
					@foreach($contacts as $contact) -->
					<div class="row mb-2">
						<div class="col-md-10 col-sm-10">
							<input type="text" name="contact_info" class="form-control" value="{{ $employee->primary_contact }}" disabled>
						</div>
					</div>
					<!-- @endforeach -->
				</div>

				<div class="form-group">
					<label for="address_info">Address Info</label>
					<!-- <?php $addresses = explode(',', $employee->address_info);?>
					@foreach($addresses as $address) -->
					<div class="row mb-2">
						<div class="col-md-10 col-sm-10">
							<input type="text" name="address_info" class="form-control" value="{{ $employee->primary_address }}" disabled>
						</div>
					</div>
					<!-- @endforeach -->
				</div>
			</div>
		</div>
@endsection
