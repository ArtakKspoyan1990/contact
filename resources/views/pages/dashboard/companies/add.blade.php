@extends('layouts.dashboard.app')

@section('content')
    @include('layouts.dashboard.navbars.auth.topnav', ['title' => 'Company Create'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Company Create</h6>
                </div>
                <div class="px-0 pt-0 pb-2">
                    <form  method="POST" action="{{route('admin.companies.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label" for="status">{{ __('Status') }} <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1"
                                                    @if(old('status') !== null && old('status') == 1) selected @endif>{{__('Published')}}</option>
                                            <option value="0"
                                                    @if(old('status') !== null && old('status') == 0) selected @endif>{{__('Unpublished')}}</option>
                                        </select>
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('status')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="role">{{ __('Role') }}  <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="1"
                                                    @if(old('role') !== null && old('role') == 1) selected @endif>{{__('Big Company')}}</option>
                                            <option value="2"
                                                    @if(old('role') !== null && old('role') == 2) selected @endif>{{__('Company')}}</option>
                                            <option value="3"
                                                    @if(old('role') !== null && old('role') == 3) selected @endif>{{__('Individual')}}</option>
                                        </select>
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('role')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">{{ __('Name') }} <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Name for login')}}" value="{{ old('name') }}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('name')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="password">{{ __('Password') }} <sup class="text-danger">*</sup></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="{{__('Password')}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('password')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
