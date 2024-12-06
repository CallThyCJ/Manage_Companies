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
    <form id="newEmployeeForm" class="form" method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter Employee Details</h3>

        <label for="employeeFirstName">First Name</label>
        <input id="employeeFirstName" type="text" name="employeeFirstName">
        <p class="firstNameError">first name can't be blank</p>

        <label for="employeeLastName">Last Name</label>
        <input id="employeeLastName" type="text" name="employeeLastName">
        <p class="lastNameError">last name can't be blank</p>

        <label for="employeeEmail">Employee Email</label>
        <input id="employeeEmail" type="text" name="employeeEmail">
        <p class="emailError">please enter a valid email e.g example@email.com</p>

        <label for="employeePhoneNumber">Phone Number</label>
        <input id="employeePhoneNumber" type="text" name="employeePhoneNumber">
        <p class="phoneError">please enter a valid number e.g 07911123456</p>

        <label for="employeeCompany">Company</label>
        <input id="employeeCompany" type="text" name="employeeCompany">

        <button type="submit">create</button>

    </form>
</div>

<script src="{{ asset('js/formValidation.js') }}" ></script>
</body>
</html>
