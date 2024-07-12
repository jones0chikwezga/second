<!DOCTYPE html>
<html>
<head>
    <title>Laravel Cascade Dropdown</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<x-app-layout>
    <div class="container mt-5">
        <h2>Select Location</h2>
        <form>
            <div class="form-group">
                <label for="district">District</label>
                <select class="form-control" id="district" name="district">
                    <option value="">Select District</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="township">Township</label>
                <select class="form-control" id="township" name="township">
                    <option value="">Select Township</option>
                </select>
            </div>

            <div class="form-group">
                <label for="street">Street</label>
                <select class="form-control" id="street" name="street">
                    <option value="">Select Street</option>
                </select>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#district').on('change', function () {
                var district_id = this.value;
                $("#township").html('');
                $.ajax({
                    url: "{{url('/locations/townships')}}/" + district_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (result) {
                        $('#township').html('<option value="">Select Township</option>');
                        $.each(result, function (key, value) {
                            $("#township").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#street').html('<option value="">Select Street</option>');
                    }
                });
            });

            $('#township').on('change', function () {
                var township_id = this.value;
                $("#street").html('');
                $.ajax({
                    url: "{{url('/locations/streets')}}/" + township_id,
                    type: "GET",
                    dataType: 'json',
                    success: function (result) {
                        $('#street').html('<option value="">Select Street</option>');
                        $.each(result, function (key, value) {
                            $("#street").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    </x-app-layout>
</body>
</html>
