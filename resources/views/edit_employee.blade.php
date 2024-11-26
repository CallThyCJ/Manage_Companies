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
    <form id="editEmployeeForm" class="form" method="POST" action="{{ route('employees.update', ['id' => $employee['id']]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3>Update Employee Details</h3>

        <label for="editEmployeeFirstName">First Name</label>
        <input id="editEmployeeFirstName" type="text" name="editEmployeeFirstName" value="{{$employee["first_name"]}}">

        <label for="editEmployeeLastName">Last Name</label>
        <input id="editEmployeeLastName" type="text" name="editEmployeeLastName" value="{{$employee["last_name"]}}">

        <label for="editEmployeeEmail">Employee Email</label>
        <input id="editEmployeeEmail" type="text" name="editEmployeeEmail" value="{{$employee["employee_email"]}}">

        <label for="editEmployeePhoneNumber">Phone Number</label>
        <input id="editEmployeePhoneNumber" type="text" name="editEmployeePhoneNumber" value="{{$employee["employee_phone_number"]}}">

        <label for="editEmployeeCompany">Company</label>
        <input id="editEmployeeCompany" type="text" name="editEmployeeCompany" value="{{$company["company_name"]}}">

        <button type="submit">confirm</button>

    </form>
</div>

<script src="{{ asset('js/formValidation.js') }}" ></script>
</body>
</html>
