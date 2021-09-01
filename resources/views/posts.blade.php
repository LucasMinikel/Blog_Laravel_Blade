<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/post/{{$post->id}}">
                {{$post->title}}
            </a>
        </h1>
        <div>
            {{$post->excerpt}}
        </div>
        <div>
            {{$post->date}}
        </div>
    </article>
    @endforeach
</x-layout>