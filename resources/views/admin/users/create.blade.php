<x-layout>
    <x-setting heading="Create User">
        <form action="/admin/users" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="username" />

            <x-form.input name="name" />

            <x-form.input name="email" />

            <x-form.input name="password" type="password" />

            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-8">Confirm
                Password</label>
            <input name="password_confirmation" type="password" class="border border-gray-400 p-2 w-full">


            <x-form.button>Add User</x-form.button>

        </form>
    </x-setting>
</x-layout>
