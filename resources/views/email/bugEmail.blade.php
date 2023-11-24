<!DOCTYPE html>
<html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap');

</style>
<head>
    <title>you-post</title>
</head>

<body>
    <table border="0" cellspacing="0" cellpadding="0" align="center" style="width: 500px; margin: 0 auto;border-radius: 10px;background-color: #ddd;">
        <tr>
            <td style="background-color: #F7F7F8;padding-top: 18px;padding-bottom: 18px;padding-left: 18px;padding-right: 18px; text-align:center;">
                <img src="{{ $message->embed($details['logPath']) }}" alt="" width="50%">
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" align="center" width="100%" style="padding-left: 22px;padding-right: 22px;padding-bottom: 22px;">
                    <tr>
                        <td>
                            <h1 style="font-size: 30px;margin:0;text-transform: capitalize; font-family: 'Poppins', sans-serif;">{{ $details['subject'] }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 18px;margin-top: 10px;margin-bottom: 10px;font-family: 'Poppins', sans-serif; ">{{ $details['body'] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h2 style="font-size: 24px;margin:0; width:100%;"><img src="{{ $message->embed($details['imagePath']) }}" alt="User Selected Image" style="width:100%;">
</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 16px;margin-top: 10px;margin-bottom: 10px;font-family: 'Poppins', sans-serif; text-align:center;font-weight:600;">Thank You!</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
