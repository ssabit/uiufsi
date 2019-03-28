<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <style type="text/css">
        a:link {
            text-decoration: none;
        }
        a:visited {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        a:active {
            text-decoration: none;
        }
        body {
            background-color: #FFFFFF;
        }
        body,td,th {
            color: #000000;
        }

        @import "compass/css3";

        @import url(https://fonts.googleapis.com/css?family=Merriweather);
        $red: #e74c3c;

        *,
        *:before,
        *:after {
        @include box-sizing(border-box);
        }

        html, body {
            background: #f1f1f1;
            font-family: 'Merriweather', sans-serif;
            padding: 1em;
        }

        h1 {
            text-align: center;
            color: #a8a8a8;
        @include text-shadow(1px 1px 0 rgba(white, 1));
        }

        form {
            max-width: 600px;
            text-align: center;
            margin: 20px auto;

        input, textarea {
            border:0; outline:0;
            padding: 1em;
        @include border-radius(8px);
            display: block;
            width: 100%;
            margin-top: 1em;
            font-family: 'Merriweather', sans-serif;
        @include box-shadow(0 1px 1px rgba(black, 0.1));
            resize: none;

        &:focus {
         @include box-shadow(0 0px 2px rgba($red, 1)!important);
         }
        }

        #input-submit {
            color: white;
            background: $red;
            cursor: pointer;

        &:hover {
         @include box-shadow(0 1px 1px 1px rgba(#aaa, 0.6));
         }
        }

        textarea {
            height: 126px;
        }
        }


        .half {
            float: left;
            width: 48%;
            margin-bottom: 1em;
        }

        .right { width: 50%; }

        .left {
            margin-right: 2%;
        }


        @media (max-width: 480px) {
            .half {
                width: 100%;
                float: none;
                margin-bottom: 0;
            }
        }


        /* Clearfix */
        .cf:before,
        .cf:after {
            content: " "; /* 1 */
            display: table; /* 2 */
        }

        .cf:after {
            clear: both;
        }



    </style>
</head>

<body>
<table width="85%" align="center" cellspacing="0">
    <tbody>
    <tr>
        <td width="50%" align="center" valign="middle" bgcolor="purple" style="font-size: xx-large; color: #FFFFFF;">UIU Faculty And Student Info</td>
    </tr>
    <tr >
        <td valign="middle"><table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                <tbody>
                <tr align="center">
                    <td width="75%" ><table width="100%" cellspacing="0" cellpadding="15" bgcolor="#D7BDE2">
                            <form action="contact.php" class="cf" >
                                <div class="half left cf">
                                    <input type="text" id="input-name" placeholder="Name"><br><br>
                                    <input type="email" id="input-email" placeholder="Email address"><br><br>
                                    <input type="text" id="input-subject" placeholder="Subject"><br><br>
                                    <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea><br><br>
                                    <input type="submit" value="Submit" id="input-submit">
                                </div><br><br>

                            </form>

                            </tbody>
                        </table></td>
                </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#800080">&nbsp;</td>
    </tr>
    </tbody>
</table>
<p>&nbsp;</p>



</body>
</html>