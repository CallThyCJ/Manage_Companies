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
    <form id="newUserForm" class="form" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter User Details</h3>

        <label for="userFirstName">First Name</label>
        <input id="userFirstName" type="text" name="userFirstName">

        <label for="userLastName">Last Name</label>
        <input id="userLastName" type="text" name="userLastName">

        <label for="username">Username</label>
        <input id="username" type="text" name="username">

        <label for="userEmail">Email</label>
        <input id="userEmail" type="email" name="userEmail">

        <label for="userPassword">Password</label>
        <input id="userPassword" type="password" name="userPassword">

        <button type="submit">Register</button>

    </form>
</div>

{{--<script src="{{ asset('js/formValidation.js') }}" ></script>--}}
</body>
</html>