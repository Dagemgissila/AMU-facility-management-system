@extends('users.layouts.app')
@section('content')

<h1>dashboard</h1>

<div class="row">
    @if($workorder->count() > 0)
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-lg h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total request work</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$workorder->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-wrench"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
