@extends('layouts/layouts')


<div class="flex min-h-screen items-center justify-center">
    <div class="relative h-[800px] w-[400px] overflow-hidden rounded-3xl">
        <div class="h-full w-full bg-[100%]"
            style="background-image: url('https://img.freepik.com/free-vector/technology-background_23-2148119855.jpg?w=2000&t=st=1689179372~exp=1689179972~hmac=8a67af351443807b8728d4c2e1b067ba4a54be7b07c038cac30bdb71291062c1');">
        </div>
        <div class="absolute bottom-0 flex h-3/4 w-full flex-col rounded-t-3xl bg-white bg-opacity-20 shadow">
            <form class="mt-10 space-y-8 px-10 py-10 text-center">
                <div class="group relative">
                    <input type="text" id="username" required
                        class="peer h-14 w-full rounded-3xl bg-gray-100 px-4 text-sm outline-none" />
                    <label for="username"
                        class="absolute left-2 top-0 flex h-full transform items-center pl-2 text-base transition-all duration-300 group-focus-within:-top-7 group-focus-within:h-1/2 group-focus-within:pl-0 group-focus-within:text-base group-focus-within:text-white peer-valid:-top-7 peer-valid:h-1/2 peer-valid:pl-0 peer-valid:text-base peer-valid:text-white">Username</label>
                </div>

                <div class="group relative">
                    <input type="text" id="password" required
                        class="peer h-14 w-full rounded-3xl bg-gray-100 px-4 text-sm outline-none" />
                    <label for="password"
                        class="absolute left-2 top-0 flex h-full transform items-center pl-2 text-base transition-all duration-300 group-focus-within:-top-7 group-focus-within:h-1/2 group-focus-within:pl-0 group-focus-within:text-base group-focus-within:text-white peer-valid:-top-7 peer-valid:h-1/2 peer-valid:pl-0 peer-valid:text-base peer-valid:text-white">Password</label>
                </div>

                <button
                    class="h-12 w-full rounded-3xl bg-blue-900 text-white transition-all duration-300 hover:bg-blue-800">Login</button>

                <a href="#" class="inline-flex !w-auto justify-center font-medium text-white">Forgot password?</a>
            </form>

            <p class="gap-2 text-center text-white">
                Don't have an account?
                <a href="#" class="font-semibold text-blue-900 hover:text-blue-800">Sign up</a>
            </p>

            <a href="#"
                class="border-white-500 group m-auto mb-4 mt-5 inline-flex h-12 w-[320px] items-center justify-center space-x-2 rounded-3xl border px-4 py-2 transition-colors duration-300 hover:border-blue-500 hover:bg-blue-500 focus:outline-none">
                <span>
                    <svg class="text-white" width="20" height="20" fill="currentColor">
                        <path
                            d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84">
                        </path>
                    </svg>
                </span>
                <span class="text-sm font-medium text-white">Twitter</span>
            </a>

            <a href="#"
                class="border-white-500 group m-auto my-0 inline-flex h-12 w-[320px] items-center justify-center space-x-2 rounded-3xl border px-4 py-2 transition-colors duration-300 hover:border-black hover:bg-black focus:outline-none">
                <span>
                    <svg class="h-5 w-5 fill-current text-white" viewBox="0 0 16 16" version="1.1" aria-hidden="true">
                        <path fill-rule="text-white"
                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z">
                        </path>
                    </svg>
                </span>
                <span class="text-sm font-medium text-white">Github</span>
            </a>
        </div>
    </div>
</div>
