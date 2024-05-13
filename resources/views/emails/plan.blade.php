<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>TOUR PLAN INQUIRY</title>
</head>

<body>
    <h2>New Tour Plan Inquiry Received: Let's Make Your Travel Dreams a Reality!</h2>

    <p>Name: {{ $formData['name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Country: {{ $formData['country'] }}</p>
    <p>Phone: {{ $formData['number'] }}</p>
    <p>Check In: {{ $formData['arrivel'] }}</p>
    <p>Check Out: {{ $formData['departure'] }}</p>
    <p>Number Of Adults: {{ $formData['adults'] }}</p>
    <p>Number Of Childrens: {{ $formData['children'] }}</p>
    <p>Single Rooms: {{ $formData['single'] }}</p>
    <p>Double Rooms: {{ $formData['double'] }}</p>
    <p>Meal Type:</p>
    <ul>
        @foreach ($formData['meal'] as $meal)
            <li>{{ $meal }}</li>
        @endforeach
    </ul>

    <p>Hotel Type:</p>
    <ul>
        @foreach ($formData['hotel'] as $hotel)
            <li>{{ $hotel }}</li>
        @endforeach
    </ul>

    <p>What kind of holiday they like:</p>
    <ul>
        @foreach ($formData['holiday'] as $holiday)
            <li>{{ $holiday }}</li>
        @endforeach
    </ul>

    <p>What they like to see:</p>
    <ul>
        @foreach ($formData['likeToSee'] as $likeToSee)
            <li>{{ $likeToSee }}</li>
        @endforeach
    </ul>

    <p>Which activities they like:</p>
    <ul>
        @foreach ($formData['activity'] as $activity)
            <li>{{ $activity }}</li>
        @endforeach
    </ul>

    <p>vehicle Type:</p>
    <ul>
        @foreach ($formData['vehicle'] as $vehicle)
            <li>{{ $vehicle }}</li>
        @endforeach
    </ul>

    <p>Special Nots: {{ $formData['note'] }}</p>



</body>
<footer>
    <hr>
    <p>Design & Developed By <a href="https://neuroon.lk" target="_blank" rel="Neuroon Informatics">Neuroon Informatics</a></p>
</footer>

</html>
