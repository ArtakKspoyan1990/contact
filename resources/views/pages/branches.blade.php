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




        .branches {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .branches .info {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 15px;
            padding: 25px;
            cursor: pointer;

        }

        .branches .info .img-body{
            transition: box-shadow .2s, opacity .2s;
            background: #fff;
            transform-origin: center;
            will-change: transform;
            z-index: 2;
            left: 5%;
            width: 123px;
            height: 123px;
            margin-bottom: 12px;
        }


        .branches .info .img-body img{
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: scale-down;
            object-position: center center;
            box-shadow: 0 2px 4px 0 rgba(22, 29, 37, .1);
            border-radius: 50%;
        }


        .custom-switch {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 50px;
            overflow: hidden;
            background-color: #f8f9fa;
            margin-right: 10px;
        }
        .custom-switch input[type="radio"] {
            display: none;
        }
        .custom-switch label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 11px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: unset;
        }
        .custom-switch input[type="radio"]:checked + label {
            background-color: rgb(218, 165, 32);
            color: white;
        }
        .custom-switch label .fas {
            font-size: 1.2rem;
        }
        .search-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background-color: rgb(218, 165, 32);
            color: white;
            border: none !important;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-button:hover {
            background-color: rgb(218, 165, 32)
        }

        .search-button:focus, .search-input input:focus {
            outline: unset;
        }

        .search-input {
            display: none;
            flex-grow: 1;
            margin-left: 20px;
            width: 80px;
        }
        .search-input input {
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 50px;
            width: 80%;
        }
    </style>
@endpush
@section('content')
    <div class="card-page">
        <div id="blinq-card" class="blinq-card">
            <div class="container my-4">
                <div class="d-flex align-items-center">
                    <div class="custom-switch">
                        <input type="radio" id="gridView" name="view" checked>
                        <label for="gridView"><i class="fas fa-th"></i></label>
                        <input type="radio" id="listView" name="view">
                        <label for="listView"><i class="fas fa-bars"></i></label>
                    </div>
                    <button class="search-button" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                    <div class="search-input" id="searchInput">
                        <input type="text" placeholder="Որոնում..." id="searchBox">
                    </div>
                </div>
            </div>
            <div class="branches">
                <div class="info" data-href="{{ route('contact') }}">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/logo.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Any Card</p>
                    </div>
                </div>
                <div class="info" data-href="{{ route('contact') }}">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/logo.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Any Card</p>
                    </div>
                </div>
                <div class="info" data-href="{{ route('contact') }}">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/logo.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Any Card</p>
                    </div>
                </div>
                <div class="info" data-href="{{ route('contact') }}">
                    <div class="img-body">
                        <img src="{{ asset('img/contact/logo.jpg') }}" alt="">
                    </div>
                    <div class="name">
                        <p>Any Card</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#searchButton').click(function() {
                $('#searchInput').toggle();
                $('#searchBox').focus();
            });

            $('#searchBox').on('input', function() {
                var query = $(this).val().toLowerCase();
                $('.branches .info').each(function() {
                   let name = $(this).find('.name p').text().toLowerCase();
                    if (name.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });


            $('input[name="view"]').change(function() {
                if ($('#gridView').is(':checked')) {
                    $('.branches').removeClass('flex-column');
                } else if ($('#listView').is(':checked')) {
                    $('.branches').addClass('flex-column');
                }
            });
            
            $('.info').on('click', function () {
                location.href = $(this).data('href');
            })

        });
    </script>
@endpush
