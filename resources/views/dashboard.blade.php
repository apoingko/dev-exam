@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" style="padding: 0 10px;">
                        <div class="col-md-8">
                            <h5>Employees</h5>
                        </div>
                        <div class="col-md-4">
                            @if(auth()->user()->role == 'admin')
                                <a href="/create" class="btn btn-primary pull-right">Add employee</a>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-2" style="padding: 20px">
                        <table id="employeesTable" class="table table-bordered" cellspacing="0" width="100%" style="font-size: 13px;">
                            <thead>
                                <tr style="background-color: #f44336; color:white;">
                                    <th>Name</th>
                                    <th>Primary Address</th>
                                    <th>Primary Contact Info</th>
                                    <th>Age</th>
                                    <th># of Years in the Company</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                            @if(count($employees)>0)
                                @foreach($employees as $employee)
                                <tr class="trow">
                                    <td><a href="/show/{{$employee->id}}">{{ $employee->first_name.' '.$employee->last_name}}</a></td>
                                    <td>{{ $employee->primary_address }}</td>
                                    <td>{{ $employee->primary_contact }}</td>
                                    <td>
                                        <?php 
                                            $myDate = $employee->birthday;
                                            $years = \Carbon\Carbon::parse($myDate)->age;
                                            echo $years;
                                         ?>
                                    </td>
                                    <td>
                                        <?php
                                            $now = date('Y-m-d');
                                            $date1 = new DateTime($employee->date_hired);
                                            $date2 = new DateTime($now);
                                            $interval = date_diff($date1, $date2);
                                            $hired = $interval->m + ($interval->y * 12);
                                            if ($hired/12> 0){
                                                echo $hired/12 . ' yrs ';
                                            }
                                            if($hired%12 > 0 ){
                                                echo $hired%12 . ' mons';
                                            }
                                         ?>
                                    </td>
                                    <td class="text-center">
                                         @if(auth()->user()->role == 'admin')
                                        <a href="/edit/{{ $employee->id }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        {{csrf_field()}}
                                        <button class="btn btn-sm btn-danger btnDelete" data-id="{{ $employee->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                         @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr class="">
                                    <td colspan="6" class="text-center"><p>No employees</p></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
