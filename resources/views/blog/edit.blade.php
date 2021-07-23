@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-4xl">
            Update Post
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl px-4 py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-10">
    <form 
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $post->title }}" class="bg-transparent block border-b-2 w-full text-4xl outline-none">

        <textarea name="description" placeholder="Description..." class="py-10 bg-transparent block border-b-2 w-full h-30 text-xl outline-none">
            {{ $post->description }}
        </textarea> 

        <button  type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-2 px-4 rounded">
            Submit Post
        </button>
    </form>
</div>

@endsection