@extends('storemanager.layouts.app')
@section("content")
<h1>Dashboard</h1>
<div class="row">
      @if ($items->count() > 0)
      @foreach ($items as $item)
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-lg h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{$item->material_name}}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Total Amount : {{$item->amount ." ". $item->unit}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-file"></i>
                    </div>
                </div>


            </div>
        </div>
    </div>
      @endforeach

      @else
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-lg h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            No Item Found</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-file"></i>
                    </div>
                </div>


            </div>
        </div>
    </div>

      @endif
</div>
@endsection
