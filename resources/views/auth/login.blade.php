<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Head -->
<x-globals.head>

</x-globals.head>

<body>
<!-- Header -->
<x-globals.header>

</x-globals.header>

<!-- nav bar -->
<x-globals.navbar>

</x-globals.navbar>

<div class="globalContainer">
    <form id="loginForm" class="form" method="POST" action="{{route('user.login')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter User Details</h3>

        <label for="loginUserEmail">Email</label>
        <input id="loginUserEmail" type="email" name="loginUserEmail">

        <label for="loginUserPassword">Password</label>
        <input id="loginUserPassword" type="password" name="loginUserPassword">

        <button type="submit">Log In</button>

    </form>
</div>

{{--<script src="{{ asset('js/formValidation.js') }}" ></script>--}}
</body>
</html>
