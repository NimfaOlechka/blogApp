<x-layout> 
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel class="bg-gray-300">
                <h1 class="text-center font-bold text-xl">Forgot Password</h1>
                <form method="POST" action="/forgot-password" class="mt-10">
                    @csrf                 
                
                    <x-form.input name="email" type="email" autocomplete="username"/>                   
   
                    <x-form.button>Forgot Password</x-form.button>
                    
                </form>
            </x-panel>            
        </main>
    </section>
</x-layout>