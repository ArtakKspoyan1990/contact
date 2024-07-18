@extends('layouts.app')
@push('styles')
    <style type="text/css">
        .collapse-container {
            width:355px;
            margin: 30px auto 30px;
            border-radius:25px;
            background: #E9E9E9;
        }

        .collapse-button {
            width: 100%;
            padding: 15px;
            border: none;
            cursor: pointer;
            text-align: center;
            border-radius:25px;
            background: #E9E9E9;
        }

        .collapse-button .icon {
            font-size: 1.2em;
            transition: transform 0.3s ease;
            position: absolute;
            left: 16%;
            width: 10px;
            margin-top: -2px;
        }


        .collapse-button .name {
            font-size: 16px;
            font-weight: 700;
        }

        .collapse-button:focus {
            outline:unset;
        }

        .collapse-content {
            padding: 10px;
            display: none;
            justify-content:center;
            position:relative;
            width:100%;
            height:450px;
            outline:none;
        }

        .collapse-content.open {
            display: block;
        }

        .collapse-button.active .icon {
            transform: rotate(90deg);
        }

        .appointment_book1-bord {
            display: block;
            inset: 0px;
            visibility: visible;
            z-index: 101;
            opacity: 1;
            box-shadow: rgb(0, 0, 0) 0px 0px 0px;
            border-radius: 0px; position: absolute;
            width: 355px;
            height: 450px;
        }

        .appointment_book1-frame-table {
            position: relative;
            display: block;
            margin-bottom: 0px;
            overflow-y: hidden;
            z-index: 1;
            width: 355px;
            height: 450px;
        }

        .appointment_book1-table-box {
            position: absolute;
            display: block;
            left: 0px;
            overflow: hidden;
            width: 355px;
            height: 450px;
            top: 0px;
        }


        .appointment_book1-table-content {
            display:inline-block;
            border-spacing:0px;
        }

        .appointment_book1-table-child {
            box-sizing: border-box;
            width: 90%;
            margin: 0 auto
        }

        .appointment_book1-table-child .dif-input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #aaaaaa;
            outline: none;
            border-radius: 10px
        }

        .appointment_book1-table-child .textarea-input {
            width: 100%;
            height: 100px;
            box-sizing: border-box;
            border: 1px solid #aaaaaa;
            outline: none;
            border-radius: 10px
        }

        .appointment_book1-obj-day {
            box-sizing: border-box;
            width: 100%;
            border: 1px solid #aaaaaa;
            padding: 10px;
            border-radius: 10px;
        }


        .hfm_button-body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 56px;
            padding-bottom: 17px;
        }

        .hfm_button {
            margin-top: 1px;
            margin-left: 5px;
            display: inline-block;
            height: 36px;
            background: black;
            border-radius: 16px;
            padding: 5px 10px;
            color: white;
            cursor: pointer;
        }

        .appointment_book1-data-hour-element, .appointment_book1-data-minute-element {
            width: 60px;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #aaaaaa;
            outline: none;
            border-radius: 10px
        }


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
            transition: box-shadow .2s, opacity .2s;
            position: absolute;
            background: #fff;
            transform-origin: center;
            will-change: transform;
            z-index: 2;
            width: 27%;
            padding-top: 27%;
            border-radius: 50%;
            top: 83%;
        }


        .left-picture .left-picture-img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: scale-down;
            object-position: center center;
            box-shadow: 0 2px 4px 0 rgba(22, 29, 37, .1);
            border-radius: 50%;
        }


        .name-company {
            text-align: center;
            font-size: 16px;
            font-weight: 900;
            margin-top: 107px;
            color: black;
        }

        .save-btn-container {
            margin-top: 1.25rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            position: sticky;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.9) 40%);
            padding: 1.5rem 2rem calc(1.75rem +  0rem);
            z-index: 999;
            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px;
        }


        .save-btn {
            max-width: 220px;
            width: 100%;
            position: relative;
            height: 3.5rem;
            padding: .75rem 2.5rem;
            border-radius: 80px;
            white-space: nowrap;
            font-weight: 700;
            font-size: 1.375rem;
            letter-spacing: .3px;
            background: rgb(218, 165, 32);
            color: #fff;
            border: unset;
            box-shadow: 0 1px 5px 0 rgba(82, 93, 102, .25), 0 2px 8px 0 rgba(82, 93, 102, .15);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .save-btn:focus {
            outline:unset;
        }


        .save-btn:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 80px;
            background: rgba(0, 0, 0, 0);
            width: 100%;
            height: 100%;
            background: rgba( 251, 146, 65, 0.8);
            animation: ripples 3s ease-in 3;
            z-index: -1;
        }


        .progress {
            height: 4px;
            width: 0;
            background-color:white;
            position: absolute;
            bottom: -1px;
            border-radius: 2px;
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
                         src="{{ asset('img/contact/logo.jpg') }}">
                </div>

            </header>

            <p class="name-company">
                Any Card
            </p>

            <div id="main-div">
                <div id="win1" class="win1">
                    <div id="cont">
                        <div class="cont_block">
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="tel:+37499883888">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/phone.jpg') }}" alt="">
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
                                <a class="quad_link" href="https://www.anycard.am">
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
                                <a class="quad_link" href="https://www.instagram.com/any_card_?igsh=bnI3eWg5MmFkMm5x&utm_source=qr">
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
                                            <img src="{{ asset('img/contact/icon/location.jpeg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Location</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/viber.jpeg') }}" alt="">
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
                                <a class="quad_link" href="{{ route('employees') }}">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/employees.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Employees</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="mailto:anycard.yerevan@gmail.com">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/mms.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Mail</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="#">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/disconts.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Disconts</div>
                                </a>
                            </div>
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="{{ route('branches') }}">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/branches.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Branches</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse-container">
                <button class="collapse-button">
                    <span class="icon">
                        <img src="{{asset('img/contact/icon/right.svg')}}" alt="">
                    </span>
                    <span class="name">Book a visit</span>
                </button>
                <div class="collapse-content">
                    <div tabindex="0" class="appointment_book1-bord">
                        <div class="appointment_book1-frame">
                            <div class="appointment_book1-frame-table">
                                <div class="appointment_book1-table-box">
                                    <div class="appointment_book1-table-content">
                                        <div class="appointment_book1-table-child">
                                            <table border="0" style="width:100%;box-sizing:border-box;">
                                                <tbody>
                                                <tr>
                                                    <td colspan="4">
                                                        <div>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="dif-input" placeholder="First name" spellcheck="true" value="">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding:5px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="" class="">
                                                                        <input type="text" class="dif-input " placeholder="Last name" spellcheck="true" value="">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding:5px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="email" class="dif-input" placeholder="E-mail" spellcheck="true" value="">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding:5px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="tel" class="dif-input" placeholder="37433220094" spellcheck="true" value="">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding:5px"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:210px;border:0px solid #000000;text-align:left;">
                                                        <input type="date" name="day" class="appointment_book1-obj-day" value="{{  Carbon\Carbon::today()->toDateString()}}">
                                                    </td>
                                                    <td style="border:0px solid #000000;text-align:left;padding-left:2px;width:80px;">
                                                        <div>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="" class="">
                                                                        <select class="appointment_book1-data-hour-element">
                                                                            <option value="0"></option>
                                                                            <option value="1">00</option>
                                                                            <option value="2">01</option>
                                                                            <option value="3">02</option>
                                                                            <option value="4">03</option>
                                                                            <option value="5">04</option>
                                                                            <option value="6">05</option>
                                                                            <option value="7">06</option>
                                                                            <option value="8">07</option>
                                                                            <option value="9">08</option>
                                                                            <option value="10">09</option>
                                                                            <option value="11">10</option>
                                                                            <option value="12">11</option>
                                                                            <option value="13">12</option>
                                                                            <option value="14">13</option>
                                                                            <option value="15">14</option>
                                                                            <option value="16">15</option>
                                                                            <option value="17">16</option>
                                                                            <option value="18">17</option>
                                                                            <option value="19">18</option>
                                                                            <option value="20">19</option>
                                                                            <option value="21">20</option>
                                                                            <option value="22">21</option>
                                                                            <option value="23">22</option>
                                                                            <option value="24">23</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <td style="text-align:center;">:</td>
                                                    <td style="border:0px solid #000000; text-align:left">
                                                        <div id="id-appointment_book1-data-minute-obj" style="" class="">
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <select class="appointment_book1-data-minute-element">
                                                                            <option value="0"></option>
                                                                            <option value="00">00</option>
                                                                            <option value="05">05</option>
                                                                            <option value="10">10</option>
                                                                            <option value="15">15</option>
                                                                            <option value="20">20</option>
                                                                            <option value="25">25</option>
                                                                            <option value="30">30</option>
                                                                            <option value="35">35</option>
                                                                            <option value="40">40</option>
                                                                            <option value="45">45</option>
                                                                            <option value="50">50</option>
                                                                            <option value="55">55</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="padding:5px"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <div>
                                                            <table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%">
                                                                <tbody>
                                                                <tr>
                                                                    <td style="" class="">
                                                                        <textarea spellcheck="true" class="textarea-input" placeholder="Message"></textarea>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="hfm_button-body">
                                                <button type="button" class="hfm_button">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <div id="save-btn-container" class="save-btn-container">
                <button id="save-contact-btn" data-type="primary" data-size="large"  data-app-clip="false" data-variant="primary" class="save-btn">
                    <span>Save Contact</span>
                    <div class="progress"></div>
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.collapse-button').on('click', function() {
                $(this).toggleClass('active');
                $(this).find('.icon').toggleClass('open');
                $(this).next('.collapse-content').slideToggle();
            });
            
            $('#save-contact-btn').on('click', function () {
                let contact = {
                    name: 'John Doe',
                    phone: '+1234567890',
                    email: 'john.doe@example.com'
                };

                if (navigator.contacts) {
                    navigator.contacts.save(contact, function() {
                        alert('Contact saved successfully');
                    }, function(error) {
                        alert('Error saving contact: ' + error);
                    });
                } else {
                    alert('Contacts API not supported');
                }
            })
        });
    </script>
@endpush
