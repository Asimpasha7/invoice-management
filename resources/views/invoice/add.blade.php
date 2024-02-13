<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Create Invoice</h2>
    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description"  required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status:</label>
            <select class="form-control" id="payment_status" name="payment_status" required>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_date">Payment Date:</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date">
        </div>
        <hr>
        <h3>Invoice Items</h3>
        <div id="invoice_items">
            <div class="row invoice-item">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="item_description">Item Description:</label>
                        <input type="text" class="form-control" name="item_description[]" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="item_quantity">Quantity:</label>
                        <input type="number" class="form-control" name="item_quantity[]" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="item_amount">Amount:</label>
                        <input type="number" class="form-control" name="item_amount[]" required>
                    </div>
                </div>
                <div class="col-md-2 col-md-2 align-self-end">
                    <div class="form-group">
                        <button type="button" class="btn btn-lg btn-danger remove-item"> -</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="add_item">Add Item</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#add_item').click(function() {
    //         $('#invoice_items').append('<div class="row"><div class="col-md-6"><div class="form-group"><label for="item_description">Item Description:</label><input type="text" class="form-control" name="item_description[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_quantity">Quantity:</label><input type="number" class="form-control" name="item_quantity[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_amount">Amount:</label><input type="number" class="form-control" name="item_amount[]" required></div></div></div>');
    //     });
    // });\


   
    $(document).ready(function() {
        $('#add_item').click(function() {
            $('#invoice_items').append('<div class="row invoice-item"><div class="col-md-6"><div class="form-group"><label for="item_description">Item Description:</label><input type="text" class="form-control" name="item_description[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_quantity">Quantity:</label><input type="number" class="form-control" name="item_quantity[]" required></div></div><div class="col-md-2"><div class="form-group"><label for="item_amount">Amount:</label><input type="number" class="form-control" name="item_amount[]" required></div></div><div class="col-md-2 align-self-end"><button type="button" class="btn btn-lg btn-danger remove-item">-</button></div></div>');
        });

        // Dynamically added button click event
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.invoice-item').remove();
        });
    });
</script>


</body>
</html>
