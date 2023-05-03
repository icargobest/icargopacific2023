<!DOCTYPE html>
<html>
<head>
    <title>Search Tracking ID</title>
</head>
<body>
    <form action="/search" method="POST">
        @csrf
        <label for="id">Enter Tracking ID:</label>
        <input type="text" id="id" name="tracking_number">
        <button type="submit">Search</button>
    </form>
    <div id="message"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#message').text(response.message);
                    if (response.data) {
                        $('#message').append('<br>ID: ' + response.data.tracking_number);
                    }
                },
                error: function(response) {
                    $('#message').text('An error occurred while searching for user.');
                }
            })
        })
    </script>
    </form>
</body>
</html>
