@extends('layouts/layouts')

<div class="bg-black w-full h-full flex justify-center items-center">




    {{-- <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
            bis_skin_checked="1"></div> --}}
    @csrf
    <div
        class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 
            shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20
             border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
        <div class="p-6">


            <p class="m-5 text-sm font-medium text-white/50">
                Hello, {{ auth()->user()->username }}
            </p>

            <a href="{{ asset('/logout') }}">
                <button type="submit"
                    class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                    <span class="ml-3">
                        Logout
                    </span>
                </button>
            </a>
        </div>
    </div>
</div>
