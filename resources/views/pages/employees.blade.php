@extends('layouts.app')
@push('styles')
    <style type="text/css">
        .card-page {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            background: rgba(255, 255, 255, 0.14);
            padding: 1rem 0;
        }


        .blinq-card {
            max-width: 440px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            border-radius: 12px;
            background: #fff;
            width: 100%;
            box-shadow: rgba(15, 15, 15, .05) 0px 0px 0px 1px,
            rgba(15, 15, 15, .1) 0px 3px 6px, rgba(15, 15, 15, .2) 0px 9px 24px;
        }




        .members {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .members .info {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 10px;
            padding: 5px;

        }

        .members .info .img-body{
            transition: box-shadow .2s, opacity .2s;
            background: #fff;
            transform-origin: center;
            will-change: transform;
            z-index: 2;
            left: 5%;
            width: 100px;
            margin-bottom: 12px;
        }


        .members .info .img-body img{
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: cover;
            object-position: center center;
            box-shadow: 0 2px 4px 0 rgba(22, 29, 37, .1);
            border-radius: 50%;
        }
    </style>
@endpush
@section('content')
    <div class="card-page">
        <div id="blinq-card" class="blinq-card">
            <div class="members">
                <div class="info">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/members/poxos.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Պողոս Պողոսյան</p>
                    </div>
                    <div class="position">
                        <p>Տնօրեն</p>
                    </div>
                </div>
                <div class="info">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/members/poxos.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Պողոս Պողոսյան</p>
                    </div>
                    <div class="position">
                        <p>Տնօրեն</p>
                    </div>
                </div>
                <div class="info">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/members/poxos.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Պողոս Պողոսյան</p>
                    </div>
                    <div class="position">
                        <p>Տնօրեն</p>
                    </div>
                </div>
                <div class="info">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/members/poxos.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Պողոս Պողոսյան</p>
                    </div>
                    <div class="position">
                        <p>Տնօրեն</p>
                    </div>
                </div>
                <div class="info">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/members/poxos.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Պողոս Պողոսյան</p>
                    </div>
                    <div class="position">
                        <p>Տնօրեն</p>
                    </div>
                </div>
                <div class="info">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/members/poxos.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Պողոս Պողոսյան</p>
                    </div>
                    <div class="position">
                        <p>Տնօրեն</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$(".banner").remove();--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}
