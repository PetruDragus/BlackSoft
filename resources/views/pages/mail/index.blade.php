<!DOCTYPE html>

<html>
    <head>
        <style type="text/css">
            * {
                font-size: 15px;
                font-family: Arial;
            }

            body {
                margin: 0;
            }

            div#logo {
                text-align: center;
                height: 150px;
                background-color: #fbb040;
            }

            div#logo > img {
                margin-top: 4%;
                width: 40%;
            }

            div#top-information {
                display: inline-flex;
                background-color: #000;
                color: #fff;
                padding: 35px 50px;
                box-shadow: 0 0 25px #000;
                margin-bottom: 50px;
            }

            .left-column {
                margin: auto;
                margin-right: 75px;
            }

            .left-column img {
                width: 50px;
            }

            p.information-title {
                font-weight: 700;
                font-size: 22px;
                margin: 0;
            }

            p.information-subtitle {
                font-weight: 200 !important;
                color: #d6d6d6;
                font-size: 12px;
            }

            span.bold {
                font-weight: 700;
            }

            p.information-footer {
                color: #00AEEF;
                margin-bottom: 0;
            }

            div#content .row {
                padding: 25px 50px;
            }

            .item-left img {
                width: 50px;
            }

            hr.row-divider {
                border-bottom: 1px solid #00AEEF;
            }

            .width-65 {
                width: 65% !important;
            }

            .width-65 {
                width: 100% !important;
            }

            .width-35 {
                width: 35% !important;
            }

            .item {
                display: inline-flex;
            }

            .item-left {
                margin-right: 25px;
            }

            p.item-title {
                margin: 0;
                margin-bottom: 5px;
            /* font-size: 13px; */
                color: #5e5e5e;
            }

            p.item-result {
                color: #000;
                font-weight: 500;
                margin-top: 0;
            }

            .one-column {
                display: grid;
            }

            .one-column > .item {
                margin-bottom: 25px;
            }

            .multi-column {
                display: flex;
            }

            div#footer-information {
                display: grid;
                background-color: #000;
                color: #fff;
                padding: 35px 50px;
                box-shadow: 0 0 25px #000;
                margin-top: 50px;
                /* width: 100%; */
            }

            div#footer {
                height: 100px;
                background-color: #fbb040;
            }

            .item-right.without-ion {
                margin-left: 50px;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <header>
                <div id="logo">
                    <img src="https://blackhansa.de/images/blackhansa-logo.png">
                </div>
            </header>

            <div id="top-information">
                <div class="left-column">
                    <img src="/mail/icons-16.svg">
                </div>

                <div class="right-column">
                    <p class="information-title">Ride Updated!</p>
                    <p class="information-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting <span class="bold">#7567563</span>. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="information-footer">Please accept or rejet this ride until 14:30 Oct 19 otherwise the ride will be addd back into the system.</p>
                </div>
            </div>

            <div id="content">
                <div class="row multi-column">
                    <div class="item width-65">
                        <div class="item-left">
                            <img src="/mail/icons-01.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Date</p>
                            <p class="item-result">20/02/2020</p>
                        </div>
                    </div>

                    <div class="item width-35">
                        <div class="item-left">
                            <img src="/mail/icons-02.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Time</p>
                            <p class="item-result">20:25</p>
                        </div>
                    </div>
                </div>

                <div class="row multi-column">
                    <div class="item width-65">
                        <div class="item-left">
                            <img src="/mail/icons-03.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Booking number</p>
                            <p class="item-result">#6544</p>
                        </div>
                    </div>

                    <div class="item width-35">
                        <div class="item-left">
                            <img src="/mail/icons-04.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Distance</p>
                            <p class="item-result">ca. 47km</p>
                        </div>
                    </div>
                </div>

                <div class="row multi-column">
                    <div class="item width-65">
                        <div class="item-left">
                            <img src="/mail/icons-05.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Category</p>
                            <p class="item-result">First Class</p>
                        </div>
                    </div>

                    <div class="item width-35">
                        <div class="item-left">
                            <img src="http://127.0.0.1:8000/mail/icons-06.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Net price</p>
                            <p class="item-result">EUR 48.65</p>
                        </div>
                    </div>
                </div>

                <hr class="row-divider">

                <div class="row one-column">
                    <div class="item width-100">
                        <div class="item-left">
                            <img src="/mail/icons-07.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Pick up location:</p>
                            <p class="item-result">Airport Berlin Tigel (TXL), All terminals, exit after baggage claim, 1304 Berlin</p>
                        </div>
                    </div>

                    <div class="item width-100">
                        <div class="item-left">
                            <img src="">
                        </div>

                        <div class="item-right without-ion">
                            <p class="item-title">Drop off location:</p>
                            <p class="item-result">Airport Berlin Tigel (TXL), All terminals, exit after baggage claim, 1304 Berlin</p>
                        </div>
                    </div>
                </div>

                <hr class="row-divider">

                <div class="row multi-column">
                    <div class="item width-65">
                        <div class="item-left">
                            <img src="https://image.flaticon.com/icons/svg/747/747310.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Date:</p>
                            <p class="item-result">20/02/2020</p>
                        </div>
                    </div>

                    <div class="item width-35">
                        <div class="item-left">
                            <img src="https://image.flaticon.com/icons/svg/747/747310.svg">
                        </div>

                        <div class="item-right">
                            <p class="item-title">Date:</p>
                            <p class="item-result">20/02/2020</p>
                        </div>
                    </div>
                </div>

            </div>

            <div id="footer-information">
                <p>Be sure to double check the new ride information.<br>
                If ypu have any question, please contact: booking@blackhansa.de</p>

                <p>Best regards,</p>
                <p>blackhansa team</p>
            </div>

            <div id="footer">
                <div class="row multi-column">
                    <div class="item width-65">
                        <p>blackhansa GmbH</p>
                        <p>Helensee strabe nr. 3 10711 Berlin</p>
                    </div>

                    <div class="item width-35">
                        <p>icons</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>