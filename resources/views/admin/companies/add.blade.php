@extends('admin.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ url('admin/companies/list') }}" class="text-muted">Companies </a>/</span> Add Companies</h4>
        <div class="col-md-12">
        <div class="row">
            <div class="card mb-4">
                    <div class="add-button p-2">
                    <a href="{{ url('admin/companies/list') }}" class="add_category btn btn-primary float-end">Back</a>
                    </div>
                    <form action="{{ url('admin/companies/add') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="defaultFormControlInput" class="form-label">Select Job Category</label>
                                    <select name="jobcategory" id="defaultFormControlInputq" class="form-select">
                                        <option value="">Select Job Category</option>
                                        @foreach ($jobcategory as $row)
                                            <option value="{{ $row->jobcategory }}">{{$row->jobcategory}}</option>
                                
                                        @endforeach
                                    </select>
                                    @error('jobcategory')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Company Name</label>
                                    <input type="text" name="companies_name" class="form-control" id="defaultFormControlInput" placeholder="Company Name" aria-describedby="defaultFormControlHelp" >
                                    @error('companies_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                <label for="defaultFormControlInput1" class="form-label">Company image</label>
                                <input type="file" name="image" class="form-control" id="defaultFormControlInput1" placeholder="Company image" aria-describedby="defaultFormControlHelp" >

                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Select Work period</label>
                                    <select name="time" id="defaultFormControlInput" class="form-select">
                                            <option value="">Select Work Period</option>
                                            <option value="full_time">Full Time</option>
                                            <option value="part_time">Part Time</option>
                                    </select>
                                    @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="country-dropdown" class="form-label">Select Country</label>
                                    <select name="country" id="country-dropdown" class="form-select">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country) 
                                        <option value="{{$country->id}}">
                                         {{$country->name}}
                                         @endforeach
                                        </option>
                                    </select>
                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="state-dropdown" class="form-label">Select State</label>
                                    <select name="state" id="state-dropdown" class="form-select">
                                    </select>
                                    @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="city-dropdown" class="form-label">Select City</label>
                                    <select name="city" id="city-dropdown" class="form-select">
                                        {{-- <option value="">Select City</option> --}}
                                    </select>
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput7" class="form-label">Salary Motnly</label>
                                    <input type="text" name="salary" class="form-control" id="defaultFormControlInput7" placeholder="salary" aria-describedby="defaultFormControlHelp" >
                                    @error('salary')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Select Experience Employe</label>
                                    <select name="experience" id="defaultFormControlInput" class="form-select">
                                            <option value="">Select Experience</option>
                                            <option value="1">1 Year</option>
                                            <option value="2">2 Year</option>
                                            <option value="3">3 Year</option>
                                            <option value="4">4 year</option>
                                            <option value="5">5 Year</option>
                                    </select>
                                    @error('experience')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Companies Description</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div>
                                    <label for="defaultFormControlInput" class="form-label">Status</label>
                                    <select name="status" id="defaultFormControlInput" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
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
    <script>
 
        $(document).ready(function() {
         
            $('#country-dropdown').on('change', function() {
                    var country_id = this.value;
                    $("#state-dropdown").html('');
                    $.ajax({
                        url:"{{url('get-states-by-country')}}",
                        type: "POST",
                        data: {
                            country_id: country_id,
                            _token: '{{csrf_token()}}' 
                        },
                        dataType : 'json',
                        success: function(result){
                            $('#state-dropdown').html('<option value="">Select State</option>'); 
                            $.each(result.states,function(key,value){
                            $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                            $('#city-dropdown').html('<option value="">Select State First</option>'); 
                        }
                    });
            });    
         
            $('#state-dropdown').on('change', function() {
                    var state_id = this.value;
                    $("#city-dropdown").html('');
                    $.ajax({
                        url:"{{url('get-cities-by-state')}}",
                        type: "POST",
                        data: {
                            state_id: state_id,
                             _token: '{{csrf_token()}}' 
                        },
                        dataType : 'json',
                        success: function(result){
                            $('#city-dropdown').html('<option value="">Select City</option>'); 
                            $.each(result.cities,function(key,value){
                                
                            $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
         
                        }
                    });
                 
                 
            });
        });
        </script>
@endsection
