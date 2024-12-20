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

<!-- Employee Information -->
<div id="companyContainer" class="globalContainer">
    <div id="companyTopSection">
        <h2>Company Details</h2>
        <a href="{{url('/')}}">Back To Companies Page</a>
    </div>

    <div id="companyBottomSection">
        <p>{{$company["company_name"]}}</p>

        <div class="editButton">
            <a href="{{url('/' . $company['id'] .'/edit')}}">edit</a>
        </div>

        <ul>
            <li>Email: {{$company["company_email"]}}</li>
            <li>Website: {{$company["company_website"]}}</li>
        </ul>
    </div>
</div>

</body>
</html>
