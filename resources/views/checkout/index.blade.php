@extends('layouts.header')
@section('content')
<div class="checkout-container dark-theme">
    <form action="{{ route('cart.checkout') }}" method="POST" class="checkout-form">
        @csrf
        <h1 class="checkout-title">🛒 Checkout</h1>

        {{-- Personal Details Section --}}
        <section class="checkout-section">
            <h2>Personal Details</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" maxlength="50" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="phone">Contact Number:</label>
                <input type="text" name="phone" id="phone" maxlength="16" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="delivery_method">Pickup or Delivery:</label>
                <select name="delivery_method" id="delivery_method" required>
                    <option value="pickup">Pickup</option>
                    <option value="delivery">Delivery</option>
                </select>
            </div>
            <div class="form-group" id="address-field" style="display: none;">
                <label for="address">Address:</label>
                <textarea name="address" id="address" rows="3" placeholder="Enter your delivery address"></textarea>
            </div>
            <div class="form-group" id="delivery-estimate" style="display: none;">
                <label for="delivery_time">Estimated Delivery Time:</label>
                <input type="text" id="delivery_time" readonly placeholder="Estimated delivery time" class="readonly-field">
            </div>
        </section>

        {{-- Payment Details Section --}}
        <section class="checkout-section">
            <h2>Payment Details</h2>
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" id="card_number" maxlength="16" placeholder="XXXX XXXX XXXX XXXX" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date (MM/YY):</label>
                <input type="text" name="expiry_date" id="expiry_date" maxlength="5" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV:</label>
                <input type="text" name="cvv" id="cvv" maxlength="3" placeholder="XXX" required>
            </div>
        </section>

        {{-- Submit Button --}}
        <div class="form-actions">
            <button type="submit" class="btn-dark">Submit Payment</button>
        </div>
    </form>
</div>

<style>
    .checkout-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: #1c1c1c;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        color: #fff;
    }
    .checkout-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 20px;
        color: #f8b400;
    }
    .checkout-section {
        margin-bottom: 20px;
    }
    .checkout-section h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #f8b400;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #ccc;
    }
    .form-group input,.form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #444;
        border-radius: 5px;
        background: #2c2c2c;
        color: #fff;
        font-size: 1rem;
    }
    .form-group input::placeholder, .form-group textarea::placeholder {
        color: #777;
    }
    .readonly-field {
        background-color: #2c2c2c;
        color: #aaa;
    }
    .form-actions {
        text-align: center;
        margin-top: 20px;
    }
    .btn-dark {
        background: #f8b400;
        color: #1c1c1c;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .btn-dark:hover {
        background: #ffcc33;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEHQzXBK89ZY4ROQ5LEUN-i0JF79_yMEE&libraries=places"></script>

<script>
    $(document).ready(function () {
        // Toggle address field based on delivery method
        $('#delivery_method').on('change', function () {
            if ($(this).val() === 'delivery') {
                $('#address-field').slideDown();
                $('#delivery-estimate').slideDown();
                $('#address').attr('required', true);
            } else {
                $('#address-field').slideUp();
                $('#delivery-estimate').slideUp();
                $('#address').removeAttr('required');
            }
        });

        // Address change event to calculate delivery time estimate
        $('#address').on('input', function () {
            var address = $(this).val();
            if (address.length > 5) {
                calculateDeliveryTime(address);
            }
        });

        function calculateDeliveryTime(address) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'address': address }, function(results, status) {
                if (status == 'OK') {
                    var destination = results[0].geometry.location;
                    var origin = new google.maps.LatLng(6.9271, 79.9515); // Example origin (San Francisco)
                    var service = new google.maps.DistanceMatrixService();

                    service.getDistanceMatrix({
                        origins: [origin],
                        destinations: [destination],
                        travelMode: 'DRIVING'
                    }, function(response, status) {
                        if (status == 'OK') {
                            var duration = response.rows[0].elements[0].duration.text;
                            $('#delivery_time').val('Estimated Delivery Time: ' + duration);
                        }
                    });
                } else {
                    $('#delivery_time').val('Invalid address');
                }
            });
        }
    });
</script>
@endsection
