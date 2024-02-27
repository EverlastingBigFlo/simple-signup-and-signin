@extends('layouts/layouts')

<div class="bg-black w-full h-full flex justify-center items-center">



    <form class=" text-gray-300 p-15" action="{{ route('confirmReg') }}" method="post">
        <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
            bis_skin_checked="1"></div>
        @csrf
        <div
            class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 
            shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20
             border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
            <div class="p-6">
                <h3>{{ session()->get('email') }}</h3>
                <p class="m-5 text-sm font-medium text-white/50">Welcome, please check your email and enter your token to
                    set up your account.</p>

                <!-- Email input -->
                <div class="relative mb-6">
                    <input type="number" name="token" value="{{ old('token') }}" placeholder="your token"
                        class="w-full py-[0.32rem] leading-[2.15] outline-none bg-transparent px-3 transition-all duration-200 ease-linear 
                            motion-reduce:transition-none dark:text-neutral-200 block min-h-[auto] rounded p-0 text-sm border-[1px]">
                    <small style="color: red">
                        @error('token')
                            {{ $message }}
                        @enderror
                    </small>
                </div>



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
            </div>
        </div>
    </form>
</div>
