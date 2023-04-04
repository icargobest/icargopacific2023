<!DOCTYPE html>
<html>
<head>
    <title>Generate Code</title>
</head>
<body>
    <form method="POST" action="{{ url('/generate-code') }}">
        @csrf
        <div>
            <label for="data">Enter data:</label>
            <input type="text" name="data" id="data" required>
        </div>
        <div>
            <button type="submit">Generate code</button>
        </div>
    </form>

    @if(isset($codeHtml))
        {!! $codeHtml !!}
    @endif
</body>
</html>
