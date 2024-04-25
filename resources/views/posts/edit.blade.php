@extends("layouts.app")
@section('title',"Edit Post")

@section('content')


<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    textarea {
        resize: vertical;
        min-height: 150px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 12px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container">
        <h1>Edit Post</h1>
        <form method="POST" action="/posts/{{$post['id']}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter title" value="{{ $post['title'] }}">
            </div>
            <div class="form-group">
                <label for="content">Body:</label>
                <textarea id="content" name="body" placeholder="Enter content">{{ $post['body'] }}</textarea>
            </div>
            <div class="form-group">
                <label for="user_id">Posted By:</label>
                <input type="text" id="user_id" name="user_id" placeholder="Enter posted by" value="{{ $post['user_id'] }}">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

@endsection