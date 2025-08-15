<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poll Poll</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="w-full md:flex md:items-center md:gap-2">
                <div class="flex items-center justify-between">
                    <div class="navbar-start items-center justify-between max-md:w-full">
                        <a class="link text-base-content link-neutral text-xl font-bold no-underline"
                            href="/">PollPoll</a>
                        <div class="md:hidden">
                            <button type="button" class="collapse-toggle" data-collapse="#default-navbar-collapse"
                                aria-controls="default-navbar-collapse" aria-label="Toggle navigation">
                                <span class="icon-[tabler--menu-2] collapse-open:hidden size-6"></span>
                                <span class="icon-[tabler--x] collapse-open:block hidden size-6"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="default-navbar-collapse"
                    class="md:navbar-end collapse hidden grow basis-full overflow-hidden transition-[height] duration-300 max-md:w-full">
                    <ul class="menu md:menu-horizontal gap-2 p-0 text-base max-md:mt-2">
                        <li><a href="/">Create a Poll</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
