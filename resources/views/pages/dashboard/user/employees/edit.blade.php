@extends('layouts.dashboard.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.dashboard.navbars.auth.topnav', ['title' => 'Employee Contacts'])
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Employee Contacts</h6>
                </div>
                <div class="px-0 pt-0 pb-2">
                    @if($user)
                        <div class="d-flex justify-content-center">
                            <img src="{{ $user->qr() }}" alt="" style="width: 120px;">
                        </div>
                    @endif
                    <form  method="POST" action="{{route('company.employees.contact.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="full-name">{{ __('Full name') }} <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="full_name" id="full-name" placeholder="Jhon Dole"
                                               value="{{ $contact ? $contact->full_name : null }}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('full_name')}}</span>
                                    </div>
                                </div>

                                <input type="hidden" value="{{ $user->id }}" name="id">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="phone">{{ __('Phone') }} <sup class="text-danger">*</sup></label>
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="+374********"
                                                value="{{$contact ? $contact->phone : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('phone')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="email">{{ __('Email') }} <sup class="text-danger">*</sup></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="*****@gmail.com"
                                               value="{{$contact ? $contact->email : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('email')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="website">{{ __('Website') }}</label>
                                        <input type="url" class="form-control" name="website" id="website" placeholder="https://******.com"
                                               value="{{$contact ? $contact->website : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('website')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="whats-app">{{ __('WhatsApp') }}</label>
                                        <input type="tel" class="form-control" name="whats_app" id="whats-app" placeholder="374********"
                                               value="{{$contact ? $contact->whats_app : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('whats_app')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="viber">{{ __('Viber') }}</label>
                                        <input type="tel" class="form-control" name="viber" id="viber" placeholder="374********"
                                               value="{{$contact ? $contact->viber : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('viber')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="telegram">{{ __('Telegram') }}</label>
                                        <input type="tel" class="form-control" name="telegram" id="telegram" placeholder="+374********"
                                               value="{{$contact ? $contact->telegram : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('telegram')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="facebook">{{ __('Facebook') }}</label>
                                        <input type="url" class="form-control" name="facebook" id="facebook" placeholder="https://www.facebook.com/L4VisitCard"
                                               value="{{$contact ? $contact->facebook : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('facebook')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="messenger">{{ __('Messenger') }}</label>
                                        <input type="url" class="form-control" name="messenger" id="messenger" placeholder="https://www.facebook.com/messages/t/101396131216437"
                                               value="{{$contact ? $contact->messenger : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('messenger')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="instagram">{{ __('Instagram') }}</label>
                                        <input type="url" class="form-control" name="instagram" id="instagram" placeholder="https://www.instagram.com/orderin_yerevan/reel/C0iyVPOsQw7/?next=%2Frachdavenportxx%2Ftagged%2F&hl=es"
                                               value="{{$contact ? $contact->instagram : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('instagram')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="tik-tok">{{ __('TikTok') }}</label>
                                        <input type="url" class="form-control" name="tik_tok" id="tik-tok" placeholder="https://********"
                                               value="{{$contact ? $contact->tik_tok : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('tik_tok')}}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="youtube">{{ __('Youtube') }}</label>
                                        <input type="url" class="form-control" name="youtube" id="youtube" placeholder="https://********"
                                               value="{{$contact ? $contact->youtube : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('youtube')}}</span>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="disconts">{{ __('Disconts') }}</label>
                                        <input type="url" class="form-control" name="disconts" id="disconts" placeholder="https://********"
                                               value="{{$contact ? $contact->disconts : null}}">
                                        <span class="text-danger text-xs pt-1">{{ $errors->first('disconts')}}</span>
                                    </div>
                                </div>

                                @if($user->role == 1 or $user->role == 2)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="logo">{{ __('Logo') }} (205x55)</label>
                                            <input type="file" class="form-control" name="logo" id="logo" onChange="readerImageDisplay(this.files, 'imageBox-logo', 80)">
                                            <span class="text-danger text-xs pt-1">{{ $errors->first('logo')}}</span>
                                            <div class="imageBoxPreview" id="imageBox-logo">
                                                @if($contact)
                                                    <img src="{{ $contact->logo() }}" alt="" style="width: 80px;" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="bg_img_name">{{ __('BG image') }} (1920x1080)</label>
                                            <input type="file" class="form-control" name="bg_image" id="bg_img_name" onChange="readerImageDisplay(this.files, 'imageBox-bg_image', 150)">
                                            <span class="text-danger text-xs pt-1">{{ $errors->first('bg_image')}}</span>
                                            <div class="imageBoxPreview" id="imageBox-bg_image">
                                                @if($contact)
                                                    <img src="{{ $contact->bg_image()}}" alt="" style="width: 150px;" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="position">{{ __('Position') }} <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="position" id="full-name" placeholder="Director"
                                                   value="{{ $contact ? $contact->position : null }}">
                                            <span class="text-danger text-xs pt-1">{{ $errors->first('position')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="image">{{ __('Image') }} (205x55) <sup class="text-danger">*</sup></label>
                                            <input type="file" class="form-control" name="image" id="image"  onChange="readerImageDisplay(this.files, 'imageBox-image', 100)">
                                            <span class="text-danger text-xs pt-1">{{ $errors->first('image')}}</span>
                                            <div class="imageBoxPreview" id="imageBox-image">
                                                @if($contact)
                                                    <img src="{{ $contact->image() }}" alt="" style="width: 100px;" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="location">{{ __('Location') }}</label>
                                            <input type="url" class="form-control" name="location" id="location" readonly
                                                   value="{{$contact ? $contact->location : null}}">
                                            <span class="text-danger text-xs pt-1">{{ $errors->first('location')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="address">{{ __('Address') }}</label>
                                            <input type="text" class="form-control" name="address" id="address"  readonly
                                                   value="{{$contact ? $contact->address : null}}">
                                            <span class="text-danger text-xs pt-1">{{ $errors->first('address')}}</span>
                                        </div>
                                        <input type="hidden" id="latitude" name="latitude">
                                        <input type="hidden" id="longitude" name="longitude">
                                        <div id="map" style="width: 100%; height: 400px;"></div>
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
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Change password</h6>
                </div>
                <div class="px-0 pt-0 pb-2">
                    <form  method="POST" action="{{route('company.employees.change.password')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ $user->name }}" disabled="disabled">
                                    </div>
                                </div>

                                <input type="hidden" value="{{ $user->id }}" name="id">

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


@push('js')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>
        function readerImageDisplay( files, class_box, w ) {
            var reader = new FileReader();
            w = (w) ? w : 100;
            reader.onload = function ( e ) {
                $('#' + class_box).html('<img style="width:' + w + 'px;" class="thumbnail" src="' + e.target.result + '">');
            };
            reader.readAsDataURL(files[0]);
        }

        ymaps.ready(init);
        function init() {
            var map = new ymaps.Map("map", {
                center: [40.18111, 44.51361],
                zoom: 10
            });

            map.controls.remove('searchControl');
            map.controls.remove('zoomControl');
            map.controls.remove('geolocationControl');
            map.controls.remove('routeEditor');
            map.controls.remove('trafficControl');
            map.controls.remove('typeSelector');
            map.controls.remove('fullscreenControl');

            var searchControl = new ymaps.control.SearchControl({
                options: {
                    noPlacemark: true,
                    float: 'left',
                    size: 'large'
                }
            });
            map.controls.add(searchControl);

            searchControl.events.add('resultselect', function (e) {
                var index = e.get('index');
                searchControl.getResult(index).then(function (result) {
                    var coords = result.geometry.getCoordinates();
                    var address = result.getAddressLine();
                    var locationLink = `https://yandex.com/maps/?ll=${coords[1]},${coords[0]}&z=14&text=${encodeURIComponent(address)}`;
                    $('#address').val(address);
                    $('#latitude').val(coords[0]);
                    $('#longitude').val(coords[1]);
                    $('#location').val(locationLink);
                });
            });
        }
    </script>
@endpush

