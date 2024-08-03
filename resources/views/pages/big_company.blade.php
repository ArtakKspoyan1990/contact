@extends('layouts.app')
@section('content')
    <div class="card-page">
        <div id="blinq-card" class="blinq-card">
            <header class="card-header" data-card-layout="2C" data-image-type="cover" data-has-floating-images="true" data-floating-left="profile">
                <div class="banner-image-container">
                    <img class="banner-image" alt="Banner"
                         src="{{ $data['bg_image_url'] }}" data-image-type="cover" data-editor-version="none">
                </div>
                <div class="left-picture" data-image-type="profile">
                    <img class="left-picture-img" alt="profile" src="{{ $data['logo_url'] }}">
                </div>

            </header>

            <p class="name-company">
                {{ $data['full_name'] }}
            </p>

            <div id="main-div">
                <div id="win1" class="win1">
                    <div id="cont">
                        <div class="cont_block">
                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="tel:{{$data['phone']}}">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/phone.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Phone</div>
                                </a>
                            </div>
                            @if($data['sms'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="sms:{{$data['sms']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/sms.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">SMS</div>
                                    </a>
                                </div>
                            @endif
                            @if($data['website'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ $data['website'] }}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/website.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Website</div>
                                    </a>
                                </div>
                            @endif


                            @if($data['whats_app'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="https://api.whatsapp.com/send?phone={{$data['whats_app']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/whatsapp.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">WhatsApp</div>
                                    </a>
                                </div>
                            @endif


                            @if($data['telegram'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="tg://resolve?domain={{$data['telegram']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/telegram.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Telegram</div>
                                    </a>
                                </div>
                            @endif


                            @if($data['facebook'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{$data['facebook']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/facebook.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Facebook</div>
                                    </a>
                                </div>
                            @endif

                            @if($data['messenger'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ $data['messenger'] }}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/messenger.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Messenger</div>
                                    </a>
                                </div>
                            @endif

                            @if($data['instagram'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{$data['instagram']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/instagram.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Instagram</div>
                                    </a>
                                </div>
                            @endif

                            @if($data['tik_tok'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ $data['tik_tok'] }}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/tiktok.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">TikTok</div>
                                    </a>
                                </div>
                            @endif


                            @if($data['location'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{$data['location']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/location.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Location</div>
                                    </a>
                                </div>
                            @endif

                            @if($data['viber'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="viber://add?number={{$data['viber']}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/viber.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Viber</div>
                                    </a>
                                </div>
                            @endif

                            @if($data['youtube'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ $data['youtube'] }}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/youtube.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Youtube</div>
                                    </a>
                                </div>
                            @endif

                            @if($company->employees_count > 0)
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ route('employees') . '/' .$company->security_key }}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/employees.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Employees</div>
                                    </a>
                                </div>
                            @endif

                            <div style="width:70px;height:90px;">
                                <a class="quad_link" href="mailto:{{$data['email']}}">
                                    <div class="quad">
                                        <div class="quad_block">
                                            <img src="{{ asset('img/contact/icon/mms.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="quad_text">Mail</div>
                                </a>
                            </div>

                            @if($data['disconts'])
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ $data['disconts'] }}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/disconts.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Disconts</div>
                                    </a>
                                </div>
                            @endif

                            @if($company->branches_count > 0)
                                <div style="width:70px;height:90px;">
                                    <a class="quad_link" href="{{ route('branches')  . '/' .$company->security_key}}">
                                        <div class="quad">
                                            <div class="quad_block">
                                                <img src="{{ asset('img/contact/icon/branches.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="quad_text">Branches</div>
                                    </a>
                                </div>
                            @endif
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
                <form id="contactForm">
                    <input type="hidden" name="name" value="{{ $data['full_name'] }}">
                    <input type="hidden" name="phone" value="{{$data['phone']}}">
                    <input type="hidden" name="email" value="{{$data['email']}}">
                    <button id="save-contact-btn" data-type="primary" data-size="large"  data-app-clip="false" data-variant="primary" class="save-btn" type="submit">
                        <span>Save Contact</span>
                        <div class="progress"></div>
                    </button>
                </form>
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

            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('save.contact') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    xhrFields: {
                        responseType: 'blob'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(response);
                        link.download = 'contact.vcf';
                        link.click();
                    },
                    errors: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
