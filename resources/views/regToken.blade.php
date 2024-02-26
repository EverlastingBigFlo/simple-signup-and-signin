@extends('layouts/layouts')

<div class="bg-black w-full h-full flex justify-center items-center">



    <form class=" text-gray-300 p-15" action="{{ route('loginCommand') }}" method="post">
        <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent"
            bis_skin_checked="1"></div>
        @csrf
        <div
            class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 
            shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20
             border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
            <div class="p-6">
                <h1>Sign in</h1>

                <p class="m-5 text-sm font-medium text-white/50">Welcome back, enter your credentials to continue.</p>

                {{-- where to route to when the account is being registered to the database --}}
                @if (session()->has('message'))
                    <h1 class=" text-red-600">{{ session()->get('message') }}</h1>
                @endif

                <!-- Email input -->
                <div class="relative mb-6">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email address"
                        class="w-full py-[0.32rem] leading-[2.15] outline-none bg-transparent px-3 transition-all duration-200 ease-linear 
                motion-reduce:transition-none dark:text-neutral-200 block min-h-[auto] rounded p-0 text-sm border-[1px]">
                    <small style="color: red">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </small>
                </div>


                <!-- Password input -->
                <div class="relative mb-6">
                    <input type="password" name="password" value="{{ old('password') }}"
                        class="w-full py-[0.32rem] leading-[2.15] outline-none bg-transparent px-3 transition-all duration-200 ease-linear 
                    motion-reduce:transition-none dark:text-neutral-200 block min-h-[auto] rounded p-0 text-sm border-[1px]"
                        id="exampleFormControlInput22" placeholder="Password" />
                    <small style="color: red">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </small>
                </div>


            </div>
        </div>
    </form>
</div>
