<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Created</title>
</head>
<body>
    <h1>New Leave Request</h1>
    <p>A new leave request has been created.</p>
    <p><strong>Start Date:</strong> {{ $leaveData->start_date }}</p>
    <p><strong>End Date:</strong> {{ $leaveData->end_date }}</p>
    <p><strong>Reason:</strong> {{ $leaveData->reason }}</p>
    {{-- <p><strong>Applied By:</strong> {{ $leaveData->applied_by }}</p> --}}
</body>
</html>
