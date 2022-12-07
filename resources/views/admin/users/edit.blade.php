<x-layout>

    <x-setting :heading="'Edit User -' . $user->username">
        <form action="/admin/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="username" :value="old('username', $user->username)" />

            <x-form.input name="name" :value="old('name', $user->name)" />

            <x-form.input name="email" :value="old('email', $user->email)" />

            <x-form.input name="password" type="password" autocomplete />

            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-8">Confirm
                Password</label>
            <input name="password_confirmation" type="password" class="border border-gray-400 p-2 w-full" autocomplete>


            <x-form.button>Edit Details</x-form.button>

        </form>
    </x-setting>
</x-layout>
