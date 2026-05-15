<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Enquiry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: #0b5ed7;
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .sub-header {
            text-align: center;
            padding: 15px;
            background: #eef3ff;
            color: #333;
        }

        .content {
            padding: 30px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .label {
            font-weight: bold;
            color: #444;
            width: 40%;
        }

        .value {
            color: #111;
        }

        .message-box {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fc;
            border-left: 4px solid #0b5ed7;
            border-radius: 4px;
        }

        .footer {
            background: #f1f4fa;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #666;
        }

        .footer a {
            color: #0b5ed7;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Enquiry Received</h1>
        </div>
        <div class="sub-header">
            A new user has submitted an enquiry from the website.
        </div>
        <div class="content">
            <table class="info-table">
                <tr>
                    <td class="label">Name</td>
                    <td class="value">{{ $enquiry->name }}</td>
                </tr>
                <tr>
                    <td class="label">Email Address</td>
                    <td class="value">{{ $enquiry->email }}</td>
                </tr>
                <tr>
                    <td class="label">Phone Number</td>
                    <td class="value">{{ $enquiry->mobile }}</td>
                </tr>
                <tr>
                    <td class="label">Designation</td>
                    <td class="value">{{ $enquiry->designation }}</td>
                </tr>
                <tr>
                    <td class="label">Company Name</td>
                    <td class="value">{{ $enquiry->company_name }}</td>
                </tr>
            </table>
            <div class="message-box">
                <strong>Message:</strong><br><br>
                {{ $enquiry->message }}
            </div>
        </div>
        <div class="footer">
            <p>
                This enquiry was submitted through the website.
            </p>
            <p>
                © {{ date('Y') }} GetMyPath Learning
            </p>
            <p>
                Support: <a href="mailto:marketing@getmypath.com">marketing@getmypath.com</a>
            </p>
        </div>
    </div>
</body>
</html>
