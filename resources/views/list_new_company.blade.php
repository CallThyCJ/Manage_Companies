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

    <form id="newCompanyForm" class="globalContainer" method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter Company Details</h3>

        <label for="companyName">Company Name</label>
        <input type="text" name="companyName">

        <label for="companyEmail">Company Email</label>
        <input type="text" name="companyEmail">

        <label for="companyWebsite">Company Website</label>
        <input type="text" name="companyWebsite">

        <label for="companyLogo">Company Logo</label>
        <input type="file" name="companyLogo">

        <button>create</button>

    </form>

    </body>
</html>
