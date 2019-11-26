<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

    <style>


        @import url(http://fonts.googleapis.com/css?family=Roboto:300); /*Calling our web font*/

        /* Some resets and issue fixes */
        #outlook a { padding:0; }
        body { width:100% !important; -webkit-text; size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; }
        .ReadMsgBody { width: 100%; }
        .ExternalClass {width:100%;}
        .backgroundTable {margin:0 auto; padding:0; width:100%;!important;}
        table td {border-collapse: collapse;}
        .ExternalClass * {line-height: 115%;}
        /* End reset */

        * {
            font-family: Arial !important;
        }

        a.social-link {
            margin: 0 5px;
        }

        .row {
            display: flex;
            margin: 5px 25px;
        }

        hr.divider {
            border-top: 1px solid #FF0000;
            margin: 15px 0;
        }

        .row.one-columns {
            display: grid;
        }

        .item-title {
            font-size: 14px;
        }

        .item-subtitle {
            color: #5e5e5e;
            font-size: 14px;
        }

        /* These are our tablet/medium screen media queries */
        @media screen and (max-width: 630px){


            /* Display block allows us to stack elements */
            *[class="mobile-column"] {display: block;}

            /* Some more stacking elements */
            *[class="mob-column"] {float: none !important;width: 100% !important;}

            /* Hide stuff */
            *[class="hide"] {display:none !important;}

            /* This sets elements to 100% width and fixes the height issues too, a god send */
            *[class="100p"] {width:100% !important; height:auto !important;}

            /* For the 2x2 stack */
            *[class="condensed"] {padding-bottom:40px !important; display: block;}

            /* Centers content on mobile */
            *[class="center"] {text-align:center !important; width:100% !important; height:auto !important;}

            /* 100percent width section with 20px padding */
            *[class="100pad"] {width:100% !important; padding:20px;}

            /* 100percent width section with 20px padding left & right */
            *[class="100padleftright"] {width:100% !important; padding:0 20px 0 20px;}

            /* 100percent width section with 20px padding top & bottom */
            *[class="100padtopbottom"] {width:100% !important; padding:20px 0px 20px 0px;}


        }


    </style>
</head>

<body style="padding:0; margin:0">
<div class="wrapper">
    <div id="header-logo" style="background-color: #efaf57;height: 135px; margin: auto;text-align: center;">
        <div style="margin-top: auto;margin-bottom: auto;padding-top: 3%;">
            <img src="/mail-icons/email-logo.png" style="width: 250px;">
        </div>

    </div>

    <div id="header-content" style="background-color: #000;box-shadow: 0 0 20px #5e5e5e;">
        <div style="width:100%;">
            <div style="padding: 25px 50px;display: inline-flex;">
                <div class="header-content-left" style="margin-top: auto;margin-bottom: auto;">
                    <img src="/mail-icons/icons-15.svg" width="50px">
                </div>

                <div class="header-content-right" style="margin-left: 50px;">
                    <p style="color: #ffffff;margin: 0;font-size: 28px;font-weight: 700;">Ride Cancelled!</p>
                    <p style="color:#e0e0e0;font-size: 14px;margin-top: 10px;">You ride at 15:30, Sat Dec 2019 (details below) has been cancelle. It will automatically be removed from you list of upcoming rides.</p>
                    <p style="color:#FF0000;font-size: 14px;margin-top: 10px;">You will not receive payment for this ride.</p>
                </div>
            </div>

        </div>

    </div>

    <div id="content" style="padding: 25px 0px;">
        <div class="row">
            <div class="item multi-columns" style="display: flex;width:65%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-01.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Date
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        27 Dev 2019
                    </p>
                </div>
            </div>

            <div class="item multi-columns" style="display: flex;width:35%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-02.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Time
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        20:21
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="item multi-columns" style="display: flex;width:65%;">
                <div class="icon-box">
                    <img src="/mail-icons/icons-03.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Booking number
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        #6354634564
                    </p>
                </div>
            </div>

            <div class="item multi-columns" style="display: flex;width:35%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-04.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Distance
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        ca. 260km
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="item multi-columns" style="display: flex;width:65%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-05.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Category
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        Business Class
                    </p>
                </div>
            </div>

            <div class="item multi-columns" style="display: flex;width:35%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-06.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Net Price
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        EUR 27.00
                    </p>
                </div>
            </div>
        </div>

        <hr class="divider">

        <div class="row one-columns">
            <div class="item " style="display: flex;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-07.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Pick up address
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        Strada Zaharia Stancu 6, Brașov, Romania
                    </p>
                </div>
            </div>

            <div class="item one-columns" style="display: flex;margin-left: 35px;">

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Drop off address
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        Strada Brăilei Nr. 171, Galați, Romania
                    </p>
                </div>
            </div>
        </div>

        <hr class="divider">

        <div class="row">
            <div class="item multi-columns" style="display: flex;width:65%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-08.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Passager contact
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        +407456543
                    </p>
                </div>
            </div>

            <div class="item multi-columns" style="display: flex;width:35%;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-09.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Pickup Sign
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        Teste Teste
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="item" style="display: flex;">
                <div class="icon-box">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-10.svg" width="35px">
                </div>

                <div class="item-wrap" style="margin-left: 20px;">
                    <p class="item-title" style="margin: 0 0 5px 0;color: #c1c1c1;font-weight: 300;">
                        Aditional Comment
                    </p>

                    <p class="item-subtitle" style="margin-top: 0;">
                        lorem ipsum dolor sit met
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="footer-content" style="background-color: #000;box-shadow: 0 0 20px #5e5e5e;display: inline-flex;width:100%;">
        <div style="padding: 15px 25px;width: 100%;">
            <div>
                <p style="color:#e0e0e0;font-size: 14px;margin-top: 10px;margin-bottom: 5px;">Be sure to double check the ride information.</p>
                <p style="color:#e0e0e0;font-size: 14px;margin-top: 0px;">If you have any questions, please contact: booking@blackhansa.de</p>
            </div>

            <div style="margin-top: 10px;">
                <p style="color:#e0e0e0;font-size: 14px;margin-top: 10px;margin-bottom: 5px;">Best regards,</p>
                <p style="color:#e0e0e0;font-size: 14px;margin-top: 0px;">blackhansa team</p>
            </div>
        </div>
    </div>

    <div id="footer" style="background-color: #efaf57;padding: 15px 25px;">
        <div style="width: 100%;display:inline-flex;">
            <div class="left-box" style="width: 70%;padding-top: 8px;">
                <p style="color: #5e5e5e;font-size: 14px;margin-top: 0;margin-bottom: 0px;">blackhansa GmbH</p>
                <p style="color: #5e5e5e;font-size: 14px;margin-top: 5px;margin-bottom: 0;"> Halensee Str. 3 10711 Berlin</p>
            </div>

            <div class="right-box" style="width: 30%;">
                <a class="social-link">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-11.svg" width="35px" style="padding-top: 10px;">
                </a>

                <a class="social-link">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-12.svg" width="35px" style="padding-top: 10px;">
                </a>

                <a class="social-link">
                    <img src="http://127.0.0.1:8000/mail-icons/icons-13.svg" width="35px" style="padding-top: 10px;">
                </a>

            </div>
        </div>
    </div>
</div>
</body>
</html>