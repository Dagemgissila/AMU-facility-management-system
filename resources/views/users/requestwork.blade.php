@extends('users.layouts.app')
@section('content')

<h1>Request Work order</h1>
<div class="container-fluid">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-12">

            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row p-2">

                        <div class="col-lg-12">
                            <div class="p-3">


                                @if(session()->has('message'))
                                <div class="bg-info text-white">
                                    <p class="p-2 d-flex justify-content-center align-items-center">{{session('message')}}</p>
                               </div>
                                @endif

                                <form action="{{ route('requestWork') }}" method="POST" >
                                    @csrf

                                    <div class="row d-flex flex-column">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Work Type</label>
                                                 <select name="work_type" id="" required class="form-control">
                                                    <option value="">select work type</option>
                                                    <option value="Electric">Electric</option>
                                                    <option value="Plumbing">Plumbing</option>
                                                    <option value="Carpentry">Carpentry</option>
                                                    <option value="Metalwork">Metalwork</option>
                                                    <option value="Masonry">Masonry</option>
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="middlename">Work Required</label>
                                               <textarea required name="work_required" class="form-control" placeholder="describe the work require " id="" cols="60" rows="5"></textarea>
                                            </div>
                                        </div>


                                    </div>





                                    <button class="btn btn-primary ">Submit </button>
                                </form>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
