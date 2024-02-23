@extends('layouts/layouts')

<div class="bg-black w-[100vw] h-[100vw] flex justify-center items-center">
    <form action="{{route('loginCommand')}}" method="post">
        <input type="email" name="email" value="{{old('email')}}" placeholder="Enter Email">
        <small style="color: red">
            @error('email')
                
            @enderror
        </small>
        <input type="password" name="password" value="{{old('password')}}" placeholder="Enter password">
        <small style="color: red">
            @error('password')
                
            @enderror
        </small>

        <button type="submit">Sign In</button>
    </form>
</div>