@extends('layout.admin')

@section('title', isset($user) ? 'Редактировать пользователля ID {$user->id}' :'Добавить пользователля')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($user) ? 'Редактировать пользователля ID ' . $user->id : 'Добавить нового'}}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($user) ? route('admin.admin_users.update', $user->id) : route('admin.admin_users.store') }}">
                @csrf

                @if (isset($user))
                    @method('PUT')
                @endif

                <input name="name" type="text" 
                    class="w-full h-12 border border-gray-800 rounded px-3 @error('title') text-red-500 @enderror" 
                    placeholder="Введите имя" 
                    value="{{ isset($user) ? $user->name : ''}}"/>

                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="email" type="text" 
                    class="w-full h-12 border border-gray-800 rounded px-3 @error('email') text-red-500 @enderror" 
                    placeholder="Email" 
                    value="{{ isset($user) ? $user->email : ''}}"/>

                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="password" type="password" 
                    class="w-full h-12 border border-gray-800 rounded px-3 @error('password') text-red-500 @enderror" 
                    placeholder="Пароль" />

                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="password_confirmation" type="password" 
                    class="w-full h-12 border border-gray-800 rounded px-3 @error('password_confirmation') text-red-500 @enderror" 
                    placeholder="Повторите пароль" />

                @error('password_confirmation')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                

                <div class="space-y-2">
                    <p class="font-semibold">Роли:</p>

                    @foreach($roles as $role)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                class="form-checkbox text-indigo-600"
                                {{ isset($user) && $user->roles->contains($role->id) ? 'checked' : '' }}>
                            <span class="ml-2">{{ $role->name }}</span>
                        </label>
                    @endforeach

                    @error('roles')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection