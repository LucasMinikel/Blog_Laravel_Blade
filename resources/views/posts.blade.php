<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/post/{{$post->id}}">
                {{$post->title}}
            </a>
        </h1>
        <p>
            Escrito por <a href="/authors/{{$post->author->id}}">{{$post->author->name}}</a> em <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        
        </p>
        <div>
            {{$post->excerpt}}
        </div>
    </article>
    @endforeach
</x-layout>