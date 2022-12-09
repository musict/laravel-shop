<?php
    $title = 'Password reset';
?>

@extends('layouts.auth')

@section('title', $title)

@section('content')
    <x-forms.auth-forms
        title="{{ $title }}"
        action="{{ route('password.update')}}"
        method="POST"
    >
        @csrf

        <x-forms.text-input
                name="token"
                value="{{ $token }}"
                hidden="true"
        >
        </x-forms.text-input>

        <x-forms.text-input
                name="email"
                type="email"
                value="{{ $email }}"
                placeholder="E-mail"
                readonly="true">
        </x-forms.text-input>

        <x-forms.text-input
                name="password"
                type="password"
                placeholder="Password"
                required="true"
                :isError="$errors->has('password')">
        </x-forms.text-input>

        @error('password')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror

        <x-forms.text-input
                name="password_confirmation"
                type="password"
                placeholder="Confirm password"
                required="true"
                :isError="$errors->has('password_confirmation')">
        </x-forms.text-input>

        @error('password_confirmation')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror

        <x-forms.primary-button>Update password</x-forms.primary-button>

    </x-forms.auth-forms>
@endsection

