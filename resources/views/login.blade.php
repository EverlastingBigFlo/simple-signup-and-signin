@extends('layouts/layouts')

<div class="bg-black w-full h-full flex justify-center items-center">

    <form class=" text-gray-300" action="{{ route('loginCommand') }}" method="post">
        <h1>Sign in</h1>

        <h6>Sign in to your account and explore a world of possibilities. Your journey begins here.</h6>
        <!-- Email input -->
        <div class="relative mb-6">
            <input type="password" name="password" value="{{ old('password') }}" placeholder="Email address"
                class="w-full py-[0.32rem] leading-[2.15] border-0 bg-transparent px-3  outline-none transition-all duration-200 ease-linear 
                motion-reduce:transition-none dark:text-neutral-200
                block min-h-[auto] rounded">
            <label for="exampleFormControlInput2"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Email
                address
            </label>
        </div>





        <!-- Password input -->
        <div class="relative mb-6">
            <input type="password" name="password" value="{{ old('password') }}"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] 
                    leading-[2.15] outline-none transition-all duration-200 ease-linear 
                    focus:placeholder:opacity-100 dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput22" placeholder="Password" />
            <label for="exampleFormControlInput22"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Password
            </label>
            <small style="color: red">
                @error('password')
                @enderror
            </small>
        </div>

        <div class="!mt-10">
            <button type="submit"
                class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                Log in
            </button>
            <!-- Register link -->
            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
                Don't have an account?
                <a href="#!"
                    class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700">Register</a>
            </p>
        </div>
    </form>
</div>
