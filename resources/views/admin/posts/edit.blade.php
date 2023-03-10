@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <h1>Modifica il post: {{$post->title}}</h1>

        <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
            @csrf
            @method('PUT')

                <div class="my-4">
                    <label class="form-lable" for="">Titolo</label>
                    <input value="{{$post->title}}" class="form-control" type="text" name="title">
                    @error('title')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="my-4">
                    <label class="form-lable" for="">Description</label>
                    <textarea class="form-control" name="description">{{$post->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary">Modifica</button>

        </form>

        <div class='mt-3'>
            <label for="">Categories</label>
            <select class="form-control" name="category_id" id="">
                <option value="">seleziona la categoria</option>
                @foreach ( $categories as $category )
                    <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
@endsection
