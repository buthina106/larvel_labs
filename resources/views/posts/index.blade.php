@extends("layouts.app")
@section('title',"list All Posts")

@section('content')
<a href="/posts/create" class="btn btn-primary mb-3">Create</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</td>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['body'] }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                        @if ($post['image'])
                            <img src="{{ asset('images/' . $post['image']) }}" alt="Post Image" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                <td> <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a></td>
                <td>  <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                <td>  <form action="/posts/{{ $post['id'] }}" method="post" style="display: inline;"></td>
                        @csrf
                        @method('delete')
                        <td>     <button type="submit" class="btn btn-danger btn-sm">Delete</button>    <td> 
                    </form>
               
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
