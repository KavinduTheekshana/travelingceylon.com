<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BOOKING INQUIRY</title>
</head>
<body>
    <h2>New Inquiry Received: Let's Make Your Travel Dreams a Reality!</h2>
    <p>Package: {{ $formData['package_name'] }}</p>
    <p>Name: {{ $formData['name'] }}</p>
    <p>Email: {{ $formData['email'] }}</p>
    <p>Phone: {{ $formData['phone'] }}</p>
    <p>Country: {{ $formData['country'] }}</p>
    <p>Check In: {{ $formData['checkin'] }}</p>
    <p>Check Out: {{ $formData['checkout'] }}</p>
    <!-- Include other form fields as needed -->
</body>
<footer>
    <hr>
    <p>Design & Developed By <a href="creatxsoftware.com" target="_blank" rel="Creatx Software">Creatx Software</a></p>
</footer>
</html>
