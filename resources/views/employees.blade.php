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
        @if(Auth::check() && Auth::user()->admin)
        <a href="{{url('/add_new_employee')}}">Add New Employee</a>
        @endif
    </div>


        <div id="employeeListingsBottomSection" class="globalContainer">
            @foreach($employeesWithLogo as $employee)
            <a href="{{url('/employees/'. $employee['id'])}}" class="employeeCardContainer">
                <div class="employeeCardTopSection">
                    <p>{{$employee["first_name"]}}</p>
                    <p>{{$employee["last_name"]}}</p>
                </div>

                <div class="employeeCardBottomSection">
                    <img src="{{$employee["company_logo"] ?? asset('default_images/default_company_picture.png')}}" alt="company logo">
                </div>
            </a>
            @endforeach
        </div>

</div>

<div class="laravelPagination globalContainer">
    {{$employeesWithLogo->links()}}
</div>

</body>
</html>
