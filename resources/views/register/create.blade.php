<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Sign Up Now</h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    <x-form.input name="name" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                    <!-- custom input required as label name not the same as name -->
                    <label for="password_confirmation"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-8">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="border border-gray-400 p-2 w-full">

                    <x-form.button>Sign Up</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
