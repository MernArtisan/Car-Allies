@extends('web.layouts.master')
@section('title', 'Booking Successful')
@section('content')
    <div class="ltn__utilize-overlay"></div>


    <style>
        .thankyou-wrapper {
            min-height: 90vh;
            background: linear-gradient(135deg, #4572ee, #13348f);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .thankyou-card {
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            max-width: 500px;
            width: 100%;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .thankyou-icon {
            width: 90px;
            height: 90px;
            background: #28a745;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            margin: 0 auto 20px;
            box-shadow: 0 0 0 10px rgba(40, 167, 69, 0.1);
        }

        .thankyou-buttons .btn {
            min-width: 160px;
            margin: 10px;
            padding: 10px 20px;
        }
    </style>

    <div class="container py-5 thankyou-wrapper">
        <div class="thankyou-card">
            <div class="thankyou-icon">
                <i class="fas fa-check"></i>
            </div>
            <h2 class="text-success mb-3">Booking Confirmed!</h2>
            <p class="text-muted">Thank you! Your appointment has been successfully booked.<br>
            </p>

            <div class="thankyou-buttons d-flex justify-content-center flex-wrap mt-4">
                <a href="{{ url('/') }}" class="btn btn-primary">
                    <i class="fas fa-home me-1"></i> Back to Home
                </a>
                <a href="{{route('account.bookings')}}" class="btn btn-outline-success">
                    <i class="fas fa-calendar-check me-1"></i> View My Bookings
                </a>
            </div>
        </div>
    </div>
@endsection