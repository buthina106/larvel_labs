@extends("layouts.app")
@section('title', "Show Post")

@section('content')

<ul>
    <li><strong>ID:</strong> {{ $post->id }}</li>
    <li><strong>Title:</strong> {{ $post->title }}</li>
    <li><strong>Body:</strong> {{ $post->body }}</li>
    <li><strong>Name:</strong> {{ $post->user->name }}</li>
</ul>

<hr>

<div id="comments-container">
    <h2>Comments</h2>
    @foreach ($post->comments as $comment)
        <p>{{ $comment->content }}</p>
    @endforeach
</div>

<form id="comment-form" action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="content" placeholder="Your comment here"></textarea>
    <button type="submit">Add Comment</button>
</form>

@endsection

@section('scripts')
<script>
    document.getElementById('comment-form').addEventListener('submit', function(e) {
        e.preventDefault(); 

        var commentContent = document.querySelector('textarea[name="content"]').value;

        var newComment = document.createElement('p');
        newComment.textContent = commentContent;
        document.getElementById('comments-container').appendChild(newComment);

        document.querySelector('textarea[name="content"]').value = '';

    });
</script>
@endsection
