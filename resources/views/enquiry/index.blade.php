@extends('layouts.app')
@section('title', 'INTERNATIONAL SCHOOL OF MANAGEMENT ENQUIRY FORM')

@section('importcss')
    @parent

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

    <script type="text/javascript">
        window.location = "https://ism.utcc.ac.th/";
    </script>

@endsection
