<?php
    $title = 'Forgot password';
?>

@extends('layouts.auth')

@section('title', $title)

@section('content')
    <x-forms.auth-forms
        title="{{ $title }}"
        action="{{ route('password.email') }}"
        method="POST"
    >
        @csrf

        <x-forms.text-input
                name="email"
                type="email"
                placeholder="E-mail"
                value="{{ old('email') }}"
                required="true"
                :isError="$errors->has('email')">
        </x-forms.text-input>

        @error('email')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror

        <x-forms.primary-button>Send</x-forms.primary-button>

        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs">
                    <a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">
                        Login
                    </a>
                </div>
            </div>
        </x-slot:buttons>

    </x-forms.auth-forms>
@endsection
