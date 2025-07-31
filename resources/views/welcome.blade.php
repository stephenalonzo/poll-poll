<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <section class="p-6">
        <div class="mx-auto">
            <p class="mb-4">
                Which technologies have you primarily used? <span class="text-base-content font-medium">(Maximum
                    three)</span>
            </p>

            <div id="wrapper-for-copy" class="max-w-xs space-y-3">
                <input id="content-for-copy" type="text" class="input" name="option[]"
                    placeholder="Enter Technology Name" />
            </div>

            <div class="mt-4 flex max-w-xs justify-end">
                <button type="button"
                    data-copy-markup='{
    "targetSelector": "#content-for-copy",
    "wrapperSelector": "#wrapper-for-copy",
    "limit": 999
    }'
                    id="copy-content" class="btn btn-sm btn-primary">
                    &plus;
                    Add Technology
                </button>
            </div>
        </div>
    </section>
</body>

</html>
