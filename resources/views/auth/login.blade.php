<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Head -->
<x-globals.head>

</x-globals.head>

<body>
<!-- Header -->
<x-globals.header>

</x-globals.header>


<div class="globalContainer">
    <form id="loginForm" class="form" method="POST" action="{{route('login')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter User Details</h3>

        <label for="loginUserEmail">Email</label>
        <input id="loginUserEmail" type="email" name="loginUserEmail">
        <p class="emailError">please enter a valid email e.g example@email.com</p>

        <label for="loginUserPassword">Password</label>
        <input id="loginUserPassword" type="password" name="loginUserPassword">
        <p class="passwordError">password is incorrect</p>

        <button type="submit">Log In</button>

    </form>
</div>

<script src="{{ asset('js/formValidation.js') }}" ></script>
</body>
</html>
