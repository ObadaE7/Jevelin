<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>زينون | رسالة تأكيد الإشتراك</title>
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
                <span>شكرا لك على الاشتراك!🥳</span>
            </div>

            <div class="card-body">
                شكراً لك على الاشتراك في النشرة الإخبارية لمدونة {{ config('app.name') }}! نحن متحمسون لأن تكون جزءاً من
                مجتمعنا. من خلال
                هذه النشرة الإخبارية، ستصلك أحدث الأخبار والمقالات المميزة التي نقدمها. سنحرص على أن نطلعك على كل ما هو
                جديد ومفيد، بالإضافة إلى تقديم نصائح ومعلومات قيمة تعزز معرفتك. ابقَ على تواصل دائم معنا للاستفادة من كل
                المحتويات الشيقة التي نقوم بنشرها. نتمنى لك قراءة ممتعة وإثراء مستمر!
            </div>

            <div class="card-footer">
                <span>{{ config('app.name') }}، جميع الحقوق محفوظة. &copy; {{ Date('Y') }}</span>
                <span>P509 حي الحديقة، طوباس، فلسطين</span>
                <span>البريد الإلكتروني: {{ config('app.support_email') }} | الهاتف:
                    {{ config('app.support_phone') }}</span>
                <span>أنت تتلقى هذا البريد الإلكتروني لأنك اشتركت في النشرة الإخبارية لدينا</span>
                <a href="#">إلغاء الاشتراك</a>
            </div>
        </div>
    </div>
</body>

</html>
