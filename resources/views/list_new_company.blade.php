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
        <input id="companyName" type="text" name="companyName">

        <label for="companyEmail">Company Email</label>
        <input id="companyEmail" type="text" name="companyEmail">

        <label for="companyWebsite">Company Website</label>
        <input id="companyWebsite" type="text" name="companyWebsite">

        <label for="companyLogo">Company Logo</label>
        <input id="companyLogo" type="file" name="companyLogo">

        <button>create</button>

    </form>

    <script src="{{ asset('js/formValidation.js') }}" ></script>
    </body>
</html>
