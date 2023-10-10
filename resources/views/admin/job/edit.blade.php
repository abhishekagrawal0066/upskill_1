@extends('admin.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ url('admin/job/list') }}" class="text-muted">Companies </a>/</span> Add Companies</h4>
        <div class="col-md-12">
        <div class="row">
            <div class="card mb-4">
                    <div class="add-button p-2">
                    <a href="{{ url('admin/job/list') }}" class="add_category btn btn-primary float-end">Back</a>
                    </div>
                    <form action="{{route('job.update',$jobcategory->id)}}" method="post" enctype="multipart/form-data">
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
                                    <label for="defaultFormControlInput" class="form-label">Company Name</label>
                                    <input type="text" name="jobcategory" class="form-control" id="defaultFormControlInput" placeholder="Company Name" aria-describedby="defaultFormControlHelp" value={{ old('jobcategory', $jobcategory->jobcategory) }} >
                                    @error('jobcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Status</label>
                                    <select name="status" id="defaultFormControlInput" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ $jobcategory->status == 1 ? 'selected="selected"' : '' }}>Active</option>
                                        <option value="0" {{ $jobcategory->status == 0 ? 'selected="selected"' : '' }}>Disabled</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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
