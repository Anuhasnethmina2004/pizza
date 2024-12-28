<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Order Pizza</title>
</head>
<body>
    <div class="container">
        <h1 class="my-5">Build Your Pizza</h1>

        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            <div class="form-group">
                <label for="crusts">Choose Crust:</label>
                <select name="crusts[]" class="form-control" multiple required>
                    @foreach($crusts as $crust)
                        <option value="{{ $crust->id }}">{{ $crust->name }} - ${{ $crust->price }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="sauces">Choose Sauce:</label>
                <select name="sauces[]" class="form-control" multiple required>
                    @foreach($sauces as $sauce)
                        <option value="{{ $sauce->id }}">{{ $sauce->name }} - ${{ $sauce->price }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="toppings">Choose Toppings:</label>
                <select name="toppings[]" class="form-control" multiple required>
                    @foreach($toppings as $topping)
                        <option value="{{ $topping->id }}">{{ $topping->name }} - ${{ $topping->price }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</body>
</html>
