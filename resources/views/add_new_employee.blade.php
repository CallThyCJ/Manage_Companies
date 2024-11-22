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

<form id="newEmployeeForm" class="globalContainer" method="POST"  enctype="multipart/form-data">
    @csrf
    <h3>Enter Employee Details</h3>

    <label for="employeeFirstName">First Name</label>
    <input id="employeeFirstName" type="text" name="employeeFirstName">

    <label for="employeeLastName">Last Name</label>
    <input id="employeeLastName" type="text" name="employeeLastName">

    <label for="employeeEmail">Employee Email</label>
    <input id="employeeEmail" type="text" name="employeeEmail">

    <label for="employeePhoneNumber">Phone Number</label>
    <input id="employeePhoneNumber" type="text" name="employeePhoneNumber">

    <button>create</button>

</form>

<script src="{{ asset('js/formValidation.js') }}" ></script>
</body>
</html>
