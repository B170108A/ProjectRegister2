<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Attendees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .export-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px 15px;
            text-align: center;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .export-btn:hover {
            background-color: #218838;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Registered Attendees</h1>
    <a href="{{ route('public-registrations.export') }}" class="export-btn">Export to CSV</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Lucky Draw Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $index => $registration)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->email }}</td>
                    <td>{{ $registration->phone }}</td>
                    <td class="center">{{ $registration->lucky_draw_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
