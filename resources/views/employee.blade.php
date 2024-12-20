<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Head -->
<x-globals.head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        @if(Auth::check() && Auth::user()->admin)
            <div class="editButton">
                <a href="{{url('/employees/' . $employee['id'] .'/edit')}}">edit</a>
            </div>
        @endif

        <ul>
            <li>Company: {{$company["company_name"]}}</li>
            <li>Email: {{$employee["employee_email"]}}</li>
            <li>Phone Number: {{$employee["employee_phone_number"]}}</li>
        </ul>
    </div>
</div>

</body>
</html>
