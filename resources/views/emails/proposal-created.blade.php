<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal Created</title>
    <style>
        ul {
            list-style: none;
            padding: 0;
        }
    
        li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Proposal Created</h2>

    <ul>
        <li><strong>Client Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> {{ $data['name'] }}</li>
        <li><strong>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> {{ $data['email'] }}</li>
        <li><strong>Message:</strong> {{ $data['message'] }}</li>
    </ul>
    
    <br>

</body>

</html>