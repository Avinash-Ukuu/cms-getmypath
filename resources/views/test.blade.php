{{-- resources/views/payment-test.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>Payment Testing UI</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>

        body{
            font-family: Arial;
            background: #f5f5f5;
            padding: 40px;
        }

        .container{
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h2{
            margin-bottom: 30px;
        }

        .row{
            margin-bottom: 15px;
        }

        label{
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select{
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button{
            background: #0d6efd;
            color: white;
            border: none;
            padding: 14px 25px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover{
            background: #0b5ed7;
        }

        .product-box{
            background: #fafafa;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
        }

    </style>
</head>
<body>

<div class="container">

    <h2>Payment Testing UI</h2>

    <div class="product-box">

        <h3>PMP Certification</h3>

        <p><strong>Course mode:</strong> Online Live Instructor Led</p>

        <p><strong>Batch type:</strong> Weekday</p>

        <p><strong>Batch start:</strong> 2nd Mar - 27th Mar</p>

        <p><strong>Batch duration:</strong> 36 hrs</p>

        <p><strong>Batch time:</strong> 08:30 PM to 10:30 PM (IST)</p>

        <p><strong>Batch days:</strong> Mon - Fri</p>

        <p><strong>Price:</strong> 8999 INR</p>

    </div>


    <div class="row">
        <label>Name</label>

        <input
            type="text"
            id="name"
            value="Avinash"
        >
    </div>


    <div class="row">
        <label>Email</label>

        <input
            type="email"
            id="email"
            value="avinash@gmail.com"
        >
    </div>


    <div class="row">
        <label>Phone</label>

        <input
            type="text"
            id="phone"
            value="9999999999"
        >
    </div>


    <div class="row">
        <label>Country</label>

        <select id="country">

            <option value="India">
                India (Razorpay)
            </option>

            <option value="USA">
                USA (Stripe)
            </option>

            <option value="Dubai">
                Dubai (Stripe AED)
            </option>

        </select>
    </div>


    <button onclick="payNow()">
        Pay Now
    </button>

</div>


<script>

async function payNow()
{
    const courseData = {

        name: document.getElementById('name').value,

        email: document.getElementById('email').value,

        phone: document.getElementById('phone').value,

        country: document.getElementById('country').value,

        course_name: 'PMP Certification',

        course_mode: 'Online Live Instructor Led',

        batch_type: 'Weekday',

        batch_start: '2nd Mar - 27th Mar',

        batch_duration: '36 hrs',

        batch_time: '08:30 PM to 10:30 PM',

        batch_days: 'Mon - Fri',

        amount: 8999
    };


    try {

        /*
        CREATE ORDER
        */

        const response = await axios.post(
            '/api/payment/create-order',
            courseData,
            {
                headers: {
                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                }
            }
        );

        const data = response.data;


        /*
        RAZORPAY
        */

        if (data.gateway === 'razorpay') {

            const options = {

                key: data.key,

                amount: data.order.amount,

                currency: data.currency,

                order_id: data.order.id,

                name: 'Code Academics',

                description: 'Course Purchase',

                handler: async function (paymentResponse) {

                    await axios.post(
                        '/api/payment/razorpay-success',
                        {
                            ...courseData,

                            razorpay_payment_id:
                                paymentResponse.razorpay_payment_id
                        }
                    );

                    alert('Razorpay Payment Success');
                }
            };

            const razorpay = new Razorpay(options);

            razorpay.open();
        }


        /*
        STRIPE
        */

        if (data.gateway === 'stripe') {

            window.location.href =
                data.checkout_url;
        }

    } catch (error) {

        console.log(error);

        alert('Something went wrong');
    }
}

</script>

</body>
</html>
