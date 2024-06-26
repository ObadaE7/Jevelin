<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | @lang('mail.subscribe.Title') </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            color: #212529;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            direction: rtl;
        }

        .card {
            background-color: #ffffff;
            border-radius: .25rem;
            border: 1px solid #dee2e6;
            padding: 1.25rem;
        }

        .card-header {
            background-color: #F28123;
            color: #ffffff;
            padding: 1rem;
            font-size: 1.25rem;
            text-align: center;
        }

        .card-body {
            padding: 3rem 0;
            font-size: 1rem;
            text-align: start;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 0.75rem;
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }

        .card-footer span {
            display: block;
            margin: 0.25rem 0;
        }

        .card-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .card-footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>@lang('mail.subscribe.Thank you')</span>
            </div>

            <div class="card-body">
                @lang('mail.subscribe.Subscribe message')
            </div>

            <div class="card-footer">
                <span>{{ config('app.name') }}، @lang('mail.default.Copyright') &copy; {{ Date('Y') }}</span>
                <span>
                    P509 @lang('mail.subscribe.Neighborhood')، @lang('mail.subscribe.Tubas')، @lang('mail.subscribe.Palestine')
                </span>
                <span>
                    @lang('mail.subscribe.Email'): {{ config('app.support_email') }} |
                    @lang('mail.subscribe.Phone'): {{ config('app.support_phone') }}
                </span>
                <span>@lang('mail.subscribe.Receiving email hint')</span>
                <a href="#">@lang('mail.subscribe.Unsubscribe')</a>
            </div>
        </div>
    </div>
</body>

</html>
