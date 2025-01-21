<!DOCTYPE html>
<html>
<head>
    <title>Lucky Draw Winner</title>
</head>
<body>
    <h1>Lucky Draw Winner</h1>
    @if ($winner)
        <p>Congratulations, {{ $winner->name }} ({{ $winner->email }})!</p>
        <p>Your Lucky Draw Number: {{ $winner->lucky_draw_number }}</p>
    @else
        <p>No registrations yet.</p>
    @endif
</body>
</html>
