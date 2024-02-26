@extends('layouts/layouts')

<div class="min-h-screen bg-gray-800 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="mt-12 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold">
                    Sign up
                </h1>
                <div class="w-full flex-1 mt-8">
                    <div class="flex flex-col items-center">
                        <small class=" text-green-600   ">
                            {{-- where to route to when the account is being registered to the database --}}
                            @if (session()->has('message'))
                                <h1>{{ session()->get('message') }}</h1>
                            @endif
                        </small>
                    </div>

                    <div class="my-12 border-b text-center">
                        <div
                            class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Or sign up with e-mail
                        </div>
                    </div>

                    <div class="mx-auto max-w-xs">
                        {{-- form section  --}}
                        <form action="{{ route('signupCommand') }}" method="POST">
                            @csrf
                            <input
                                class="w-full px-8 py-4 my-5 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="name" name="name" placeholder="Name" value="{{ old('name') }}" />
                            <small style="color: red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </small>
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                            <small style="color: red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                type="password" name="password" placeholder="Password" value="{{ old('password') }}" />
                            <small style="color: red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </small>
                            <input
                                class="w-full px-8 py-4 my-5 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                type="password" name="password_confirmation" placeholder="Confirm Password"
                                value="{{ old('password_confirmation') }}" />
                            <small style="color: red">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </small>
                            <button type="submit"
                                class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-3">
                                    Sign Up
                                </span>
                            </button>
                        </form>
                        <!-- Register link -->
                        <p class="m-2 pt-1 text-sm font-semibold">
                            Already a member?
                            <a href="{{ asset('/login') }}"
                                class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700">Sign
                                in</a>
                        </p>
                        <p class="mt-6 text-xs text-gray-600 text-center">
                            I agree to abide by BigFlo's
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Terms of Service
                            </a>
                            and its
                            <a href="#" class="border-b border-gray-500 border-dotted">
                                Privacy Policy
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">

            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
            </div>
        </div>
    </div>
</div>
