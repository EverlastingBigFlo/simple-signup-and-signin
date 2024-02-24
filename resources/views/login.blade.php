@extends('layouts/layouts')

<div class="bg-black w-[100vw] h-[100vw] flex justify-center items-center">
   
    <form class="bg-black" action="{{ route('loginCommand') }}" method="post">
        <h1>Sign in</h1>
        <h6>Sign in to your account and explore a world of possibilities. Your journey begins here.</h6>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
        <small style="color: red">
            @error('email')
            @enderror
        </small>
        <input type="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
        <small style="color: red">
            @error('password')
            @enderror
        </small>

        <div class="!mt-10">
            <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
              Log in
            </button>
          </div>
    </form>
</div>
