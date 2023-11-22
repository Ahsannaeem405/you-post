<!DOCTYPE html>
<html>
<head>
    <title>you-post</title>
</head>
<body>
    <table width="100%">
        <tr>
            <td>
                <h1>{{ $details['title'] }}</h1>
            </td>
        </tr>
        <tr>
            <td>
                <h2>{{ $details['subject'] }}</h2>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $details['body'] }}</p>
                <!-- <img src="cid:user_selected_image" alt="User Selected Image"> -->

            </td>
        </tr>
        <tr>
            <td>
                <p>Thank you</p>
            </td>
        </tr>
    </table>
</body>
</html>
