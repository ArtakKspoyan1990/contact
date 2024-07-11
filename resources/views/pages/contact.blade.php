@extends('layouts.app')
@push('styles')
    <style type="text/css">
        .menu-product {
            background-position: center center;
            border-radius: 17px;
            padding: 11px 16px 20px 20px;
            color:white;
            will-change: filter;
            filter: var(--menu-link-image-tint,brightness(0.75) blur(0px));
            transition: transform 0.2s ease-out 0s, filter 0.2s ease-out 0s;
            cursor: pointer;
            min-height: 100%;
            height: 200px;
            top: 0px;
            left: 0px;
        }


        .menu-product:hover {
            filter: var(--menu-link-image-tint,brightness(0.65) blur(0px));
        }

        .menu-product_body {
            width: 100%;
            padding-bottom: 10px;
            min-height: inherit;
            position: relative;
        }

        .menu-product_body .title {
            text-align: center;
            position: absolute;
            color:white;
            top: 6px;
            left: 0 !important;
            right: 0 !important;
            font-weight: bold;
            font-size: 15px;
        }

        .write-info button {
            background: #642468;
            color: white;
            padding: 1px 13px;
            font-size: 14px;
            min-height: 32px;
            line-height: 16px;
            box-sizing: border-box;
            position: relative;
            display: inline-flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            vertical-align: top;
            text-align: center;
            outline: 0px;
            margin: 0px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            border:none;
            margin-top: 10px;
        }

        .write-info button:hover {
            opacity: 0.7;
        }





        .menu-body {
            display: flex;
            flex-flow: row;
            -webkit-box-align: stretch;
            align-items: stretch;
            align-content: start;
            list-style: none;
            overflow-x: auto;
            padding: 12px 14px 10px;
            width: auto;
            scroll-padding: 28px;
            gap: 8px;
        }

        .menu-body > li {
            scroll-snap-align: start;
            flex: 1 0 140px;
            max-width: 140px;
        }


        .menu-body  > li > * {
            width: 100%;
            min-height: 200px;
            margin: 0px !important;
        }

        .menu-body::-webkit-scrollbar {
            width: 2px;
            height: 2px;
        }


        .menu-body::-webkit-scrollbar-thumb {
            background: #E5E5E5;
        }


        .quad {
            display:flex;
            justify-content:center;
            align-items:center;
            width:100%;
            height:70px;
        }

        .quad_link {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            cursor: pointer;
        }

        #win1 {
            padding-bottom: 38px;
            border: 1px solid #ffffff;
            display: block;
            background: #ffffff;
            text-align: center;
            margin-top: 65px;
        }

        #cont {
            border: 1px solid #ffffff;
            display: inline-block;
            background: #ffffff;
            text-align: center;
        }

        .cont_block {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            width: 345px;
            min-height: 120px;
            margin: 25px auto auto;
            border: 0px solid #a52a2a;
        }

        .quad_block {
            width: 70px;
        }

        .quad_block img {
            width: 100%;
            border-radius: 50%;
        }

        .quad_text {
            margin-top:10px;
            text-align:center;
            color:#000000;
        }



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


        .card-header {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding-top: 42%;
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
        }


        .banner-image-container {
            width: 100%;
        }


        .card-header .banner-image {
            position: absolute;
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
            object-position: center center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            left: 0px;
            top: 0px;
        }


        .left-picture {
            position: absolute;
            background: #fff;
            transform-origin: center;
            will-change: transform;
            z-index: 2;
            left: 31%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 2px 4px 0 rgba(22, 29, 37, .1);
        }


        .left-picture .left-picture-img {
            position: absolute;
            width: 75px;
            height: 75px;
            top: 5%;
            left: 25%;
            object-fit: cover;
            object-position: center center;
            /*box-shadow: 0 2px 4px 0 rgba(22, 29, 37, .1);*/
            border-radius: 50%;
        }

        .left-picture .name {
            position: absolute;
            top: 57%;
            left: 34%;
            font-size: 14px;
            font-weight: 900;

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
            <header class="card-header" data-card-layout="2C" data-image-type="cover" data-has-floating-images="true" data-floating-left="profile">
                <div class="banner-image-container">
                    <img class="banner-image" alt="Banner"
                         src="{{ asset('img/contact/restorant.jpg') }}" data-image-type="cover" data-editor-version="none">
                </div>
                <div class="left-picture" data-image-type="profile">
                    <img class="left-picture-img" alt="profile"
                         src="{{ asset('img/contact/vizit.jpg') }}">
                    <p class="name">
                        OrderIn
                    </p>
                </div>
            </header>
            <div id="main-div">
                <div id="win1" class="win1">
                    <div id="cont">
                        <div class="cont_block">
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="tel:+37499883888">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/phone.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Phone</div>
                                </a>
                            </div>
                            {{--<div style="width:70px;height:90px;">--}}
                            {{--<a class="quad_link" href="mailto:info@orderin.am">--}}
                            {{--<div class="quad">--}}
                            {{--<div class="quad_block">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="quad_text">Mail</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="sms:+37499883888">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/sms.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">SMS</div>
                                </a>
                            </div>

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="https://orderin.am/ru">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/website.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Website</div>
                                </a>
                            </div>

                            {{--<div style="width:70px;height:90px;">--}}
                            {{--<a class="quad_link" href="https://www.google.com/maps/search/Admiral+Isakov+3/19">--}}
                            {{--<div class="quad">--}}
                            {{--<div class="quad_block">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="quad_text">Location</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="https://api.whatsapp.com/send?phone=37499883888">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/whatsapp.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">WhatsApp</div>
                                </a>
                            </div>

                            {{--<div style="width:70px;height:90px;">--}}
                            {{--<a class="quad_link" href="viber://add?number=37499883888">--}}
                            {{--<div class="quad">--}}
                            {{--<div class="quad_block">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="quad_text">Viber</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="tg://resolve?domain=+79661111250">
                                    {{--<a class="quad_link" href="https://t.me/L4vcard">--}}
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/telegram.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Telegram</div>
                                </a>
                            </div>

                            <div style="width:70px;height:90px;">
                                {{--<a class="quad_link" href="https://www.facebook.com/L4VisitCard">--}}
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/facebook.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Facebook</div>
                                </a>
                            </div>

                            <div style="width:70px;height:90px;">
                                {{--<a class="quad_link" href="https://www.facebook.com/messages/t/101396131216437">--}}
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/messenger.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Messenger</div>
                                </a>
                            </div>

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="https://www.instagram.com/orderin_yerevan/reel/C0iyVPOsQw7/?next=%2Frachdavenportxx%2Ftagged%2F&hl=es">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/instagram.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Instagram</div>
                                </a>
                            </div>

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/tiktok.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">TikTok</div>
                                </a>
                            </div>

                            {{--<div style="width:70px;height:90px;">--}}
                            {{--<a class="quad_link" href="#">--}}
                            {{--<div class="quad">--}}
                            {{--<div class="quad_block">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="quad_text">Youtube</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            {{--<div style="width:70px;height:90px;">--}}
                            {{--<a class="quad_link" href="#">--}}
                            {{--<div class="quad">--}}
                            {{--<div class="quad_block">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="quad_text">Еmployees</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            {{--<div style="width:70px;height:90px;">--}}
                            {{--<a class="quad_link" href="#">--}}
                            {{--<div class="quad">--}}
                            {{--<div class="quad_block">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="quad_text">Discounts</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/branches.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Branches</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/viber.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Viber</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/youtube.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Youtube</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/conact.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Contact</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/mms.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Mms</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/pracent.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Pracent</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <ul class="menu-body">
                <li class="menu-product_body">
                    <div class="menu-product text-center" style="background: url({{ asset('img/contact/documentation.jpg') }});background-size: cover; background-position: center ">
                    </div>
                    <p class="text-center title">Documentation</p>
                </li>
                <li class="menu-product_body">
                    <div class="menu-product text-center" style="background: url({{ asset('img/contact/video.jpg') }}); background-size: cover; background-position: center ">
                    </div>
                    <p class="text-center title">Video archive</p>
                </li>

                <li class="menu-product_body">
                    <div class="menu-product text-center" style="background: url({{ asset('img/contact/photo.jpg') }}); background-size: cover; background-position: center ">
                    </div>
                    <p class="text-center title">Photo archive</p>
                </li>
            </ul>
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
