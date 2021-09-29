@auth
<x-panel>
    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ Auth::id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Comentar...</h2>
        </header>
            <div class="mt-5">
                <textarea name="body" class="w-full text-sm focus:outline-none" rows="5" placeholder="Digite aqui" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-5">
                <button type="submit" class="bg-blue-500 text-white font-semibold text-xs py-2 px-10 round-2xl hover:bg-blue-600">Salvar</button>
            </div>
    </form>
</x-panel>
@else
    <p class="font-semibold"><a href="/register" class="hover:underline">Crie uma conta</a> ou <a href="/login" class="hover:underline">Entre</a>  para comentar.</p>
    
@endauth