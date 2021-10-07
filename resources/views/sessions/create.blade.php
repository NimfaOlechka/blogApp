<x-layout> 
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel class="bg-gray-300">
                <h1 class="text-center font-bold text-xl">Log in</h1>
                <form method="POST" action="/sessions" class="mt-10">
                    @csrf                 
                
                    <x-form.input name="email" type="email" autocomplete="username"/>

                    <x-form.input name="password" type="password" autocomplete="new-password"/>

                    {{--TODO: Fix styling for buttons for responsive view--}}
                    <div class="mt-5 md:justify-between flex items-center">
                    <x-form.button>Log in</x-form.button>
                    <a href="forgot-password" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-10 hover:bg-blue-500"
                     > Forgot password</a>
                    </div>

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs mt-1">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </x-panel>            
        </main>
    </section>
</x-layout>