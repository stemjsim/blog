<!doctype html>

<title>Mind Dump Blog</title>
<link rel="icon" type="image/x-icon" href="/images/illustration-1.png">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/9828267623.js" crossorigin="anonymous"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">

        <x-main-nav />

        {{ $slot }}

        <x-footer />

    </section>

    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 10000)" x-show="show"
            class="fixed bottom-3 right-3 bg-green-500 text-white py-2 px-4 rounded-xl">
            <p>
                {{ session('success') }}
            </p>
        </div>
    @endif
</body>
