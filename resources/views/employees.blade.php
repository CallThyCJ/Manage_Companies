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

<!-- company listing -->
<div id="employeeListingsContainer">
    <div id="employeeListingsTopSection" class="globalContainer">
        <h2>All Employees</h2>
        <a href="{{url('/add_new_employee')}}">Add New Employee</a>
    </div>

{{--    @foreach($companies as $company)--}}
        <div id="employeeListingsBottomSection" class="globalContainer">
            <div class="employeeCardContainer">
                <div class="employeeCardTopSection">
                    <p>FIRST NAME</p>
                    <p>LAST NAME</p>
                </div>

                <div class="employeeCardBottomSection">
                    <img src="" alt="company logo">
                </div>
            </div>
        </div>
{{--    @endforeach--}}
</div>

</body>
</html>
