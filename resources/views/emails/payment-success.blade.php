<!DOCTYPE html>
<html>

<head>
    <title>Payment Success</title>
</head>

<body>

    <h2>Payment Successful</h2>

    <p>
        Hi {{ $payment->name }},
    </p>

    <p>
        Your payment has been successfully completed.
    </p>

    <hr>

    <h3>Course Details</h3>

    <p>
        <strong>Course:</strong>
        {{ $payment->course_name }}
    </p>

    <p>
        <strong>Amount:</strong>
        {{ $payment->currency }}
        {{ $payment->amount }}
    </p>



    <hr>

    <p>
        Thank you for purchasing the course.
    </p>

</body>

</html>
