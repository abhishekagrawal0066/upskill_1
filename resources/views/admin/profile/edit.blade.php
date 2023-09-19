@extends('admin.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ url('admin/profile') }}" class="text-muted">Profile </a>/</span>Edit Admin profile</h4>
        <div class="col-md-12">
        <div class="row">
            <div class="card mb-4">
                    <div class="add-button p-2">
                    <a href="{{ url('admin/dashboard') }}" class="add_category btn btn-primary float-end">Back</a>
                    </div>
                    <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div>
                                <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 2000)">
                                @if(Session::has('success'))
                                    <div class="alert alert-success bg-green-300">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                 @endif
                                </div>
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="defaultFormControlInput" placeholder="Name" aria-describedby="defaultFormControlHelp" value="" >
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput1" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="defaultFormControlInput1" placeholder="ex@gmail.com" aria-describedby="defaultFormControlHelp" >
                                    
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div>
                                <button class="btn btn-dark mt-3" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
