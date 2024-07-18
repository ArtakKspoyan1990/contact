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


        .contact-card {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }
        .contact-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .contact-card h2 {
            margin: 10px 0;
            font-size: 1.5rem;
            color:rgb(218, 165, 32);
        }
        .contact-card p {
            margin: 5px 0;
            color:rgb(218, 165, 32);
        }
        .contact-card .info {
            margin: 10px 45px;
        }
        .contact-card .info a {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            background-color: rgb(218, 165, 32);
            transition: background-color 0.3s;
            color: white;
            margin-top: 8px;
        }
        .contact-card .info a:hover {
            background-color: rgb(218, 145, 9);
        }
        .contact-card .info a i {
            margin-right: 10px;
        }

    </style>
@endpush
@section('content')
    <div class="card-page">
        <div id="blinq-card" class="blinq-card">
            <div class="contact-card">
                {{--<img src="https://via.placeholder.com/100" alt="Profile Picture">--}}
                <img src="{{ asset('img/contact/members/man.jpg') }}" alt="">
                <h2>Պողոս Պողոսյան</h2>
                <p>Տնօրեն</p>
                <div class="info">
                    <a href="tel:+11234567890"><i class="fas fa-phone"></i> +1 123 456 7890</a>
                    <a href="mailto:youremail@domain.com"><i class="fas fa-envelope"></i> youremail@domain.com</a>
                    <a href="https://www.facebook.com/johndoe" target="_blank"><i class="fab fa-facebook"></i> facebook.com/johndoe</a>
                    <a href="https://www.yourwebsite.com" target="_blank"><i class="fas fa-globe"></i> www.yourwebsite.com</a>
                    <a href="#"><i class="fas fa-map-marker-alt"></i> 102-A Avenue, CA-90035</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
