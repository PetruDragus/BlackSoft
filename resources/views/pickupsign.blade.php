<!DOCTYPE html>
<html style="height: 100%;">
    <head>
        <title>sadfsaf</title>
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin:0cm 0cm;
                height:1500px;
                min-height:1500vh;
                max-height: 1500vh;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 10cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 5cm;
                box-shadow: 0 0 25px #5e5e5e;
                vertical-align: middle;
                line-height: 5cm;

                /** Extra personal styles **/
                background-color: #fbb040;
                text-align: center;
                line-height: 1.5cm;
                z-index: 10;
            }

            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                text-align: center;
                line-height: 1.5cm;
                font-size: 20px;
                font-weight: 500;
                color: #C4C5C6;
            }

            h1 {
                font-size: 80px;
                font-weight: 700;
                color: #5e5e5e;
            }
        </style>
    </head>

    <body>
        <!-- Define header and footer blocks before your content -->
        <header style="box-shadow: 0 0 25px #5e5e5e;">
            <img src="https://app.blackhansa.de/mail-icons/email-logo.png" style="width: 500px;margin-top: 1.3cm;">
        </header>

        <footer>
            www.blackhansa.de
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main style="text-align: center; width: 100%;vertical-align: middle;">
            <h1>{{ $title }}</h1>
        </main>
    </body>
</html>