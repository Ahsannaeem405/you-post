<!DOCTYPE html>
<html>

<head>
    <title>you-post</title>
</head>

<body>
    <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 500px; margin: 0 auto;border-radius: 10px;background-color: #ddd;">
        <tr>
            <td style="background-color: #F7F7F8;padding-top: 18px;padding-bottom: 18px;padding-left: 18px;padding-right: 18px;">
                <img src="{{ $message->embed($details['logPath']) }}" alt="" width="50%">
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%" style="padding-left: 22px;padding-right: 22px;padding-bottom: 22px;">
                    <tr>
                        <td>
                            <h1 style="font-size: 34px;font-family: system-ui;margin:0;">{{ $details['title'] }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 style="font-size: 24px;font-family: system-ui;margin:0;"><img src="{{ $message->embed($details['imagePath']) }}" alt="User Selected Image">
</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 18px;font-family: system-ui;margin-top: 10px;margin-bottom: 10px">{{ $details['body'] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 16px;font-family: system-ui;margin-top: 10px;margin-bottom: 10px">Thank you</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('images/Rectangle 33.png') }}" alt="" width="100%">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
