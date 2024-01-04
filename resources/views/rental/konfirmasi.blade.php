<!-- resources/views/rental/index.blade.php -->

@extends('indexlayout')

@section('admincontent')
<div class="wrapper">
    <div class="wrapper">
        <h3>Order Confirmation</h3>

        <p>Thank you for your order! Please choose the next action:</p>

        <a href="{{ $whatsappUrl }}" class="btn btn-primary" onclick="openWhatsApp()">WhatsApp Confirmation</a>

        <form method="GET" action="{{ route('pages.jadwal') }}">
            <button type="submit" class="btn btn-primary">Done</button>
        </form>
    </div>
    <script>
        function openWhatsApp() {
            var phoneNumber = '+62895385894616'; // Replace with the actual WhatsApp number
            var message = encodeURIComponent('Thank you for your order! Here are the details: ' + $whatsappUrl); // Customize your message
    
            // Open WhatsApp in a new window
            window.open('https://wa.me/' + phoneNumber + '?text=' + message, '_blank');
        }
    </script>
@endsection
