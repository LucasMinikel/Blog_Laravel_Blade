<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <p>
            Escrito por <a href="authors/{{$post->author->id}}">{{$post->author->name}}</a> em <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        
        </p>
        <div>
            <p>
                {!! $post->body !!}
            </p>
        </div>
    </article>
    <a href="/">Home</a>
</x-layout>