<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}
</head>
<body>
    <h1>{{ $maildata['title'] }} {{ $maildata['Name'] }}</h1>
    @if ($maildata['TicketNo'] != '')   
    <h2>your ticket No is {{ $maildata['TicketNo'] }}</h2>
    <span>Ticket Reason : {{ $maildata['messagess'] }}</span>
    @endif
    <p>{{ $maildata['Message'] }}</p>
</body>
</html>