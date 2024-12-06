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
    <form id="newUserForm" class="form" method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter User Details</h3>

        <label for="userFirstName">First Name</label>
        <input id="userFirstName" type="text" name="userFirstName">
        <p class="firstNameError">first name can't be blank</p>

        <label for="userLastName">Last Name</label>
        <input id="userLastName" type="text" name="userLastName">
        <p class="lastNameError">last name can't be blank</p>

        <label for="username">Username</label>
        <input id="username" type="text" name="username">
        <p class="usernameError">username can't be blank</p>

        <label for="userEmail">Email</label>
        <input id="userEmail" type="email" name="userEmail">
        <p class="emailError">please enter a valid email e.g example@email.com</p>

        <label for="userPassword">Password</label>
        <input id="userPassword" type="password" name="userPassword">
        <p class="passwordError">password must have one letter, one digit, one special character and at least 8 characters long</p>

        <button type="submit">Register</button>

    </form>
</div>

<script src="{{ asset('js/formValidation.js') }}" ></script>
</body>
</html>
