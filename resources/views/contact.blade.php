@extends('layouts.app')
@section('title', 'Contact')

@section('importcss')
    @parent
    {{-- {{ Html::style('css/custom.css') }} --}}
@stop

@section('importjs')
    @parent
    <script type="module">
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success'
            });
        @endif
    </script>
@stop

@section('content')
    <h1>Contact Us</h1>

    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf {{-- Cross-Site Request Forgery protection --}}
        <label class="form-label" for="name">Name:</label><br>
        <input class="form-control" type="text" id="name" name="name" required><br>

        <label class="form-label" for="email">Email:</label><br>
        <input class="form-control" type="email" id="email" name="email" required><br>

        <label class="form-label" for="message">Message:</label><br>
        <textarea class="form-control" id="message" name="message" required></textarea><br>

        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
@endsection
