@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Company Name</th>
                <th>Company Address</th>
                <th>Contact Person</th>
                <th>Designation</th>
                <th>Mobile No</th>
                <th>EmailAddress</th>
                <th>IT Manager</th>
                <th>ContactNo</th>
                <th>EmailAddress IT</th>
                <th>Zone</th>
                <th>Remarks</th>
                <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Serial No</th>
                <th>Company Name</th>
                <th>Company Address</th>
                <th>Contact Person</th>
                <th>Designation</th>
                <th>Mobile No</th>
                <th>EmailAddress</th>
                <th>IT Manager</th>
                <th>ContactNo</th>
                <th>EmailAddress IT</th>
                <th>Zone</th>
                <th>Remarks</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
