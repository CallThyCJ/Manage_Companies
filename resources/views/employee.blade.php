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

<!-- Employee Information -->
<div id="employeeContainer">
    <div id="employeeTopSection" class="globalContainer">
        <h2>Employee Details</h2>
        <a href="{{url('/employees')}}">Back To Employees Page</a>
    </div>

    <div id="employeeBottomSection" class="globalContainer">
        <div id="fullEmployeeName">
            <p>{{$employee["first_name"]}}</p>
            <p>{{$employee["last_name"]}}</p>
        </div>

        <div class="editButton">
            <a href="{{url('/employees/' . $employee['id'] .'/edit')}}">edit</a>
        </div>

        <ul>
            <li>Company: {{$company["company_name"]}}</li>
            <li>Email: {{$employee["employee_email"]}}</li>
            <li>Phone Number: {{$employee["employee_phone_number"]}}</li>
        </ul>
    </div>
</div>

</body>
</html>
