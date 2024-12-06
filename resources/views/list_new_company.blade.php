<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- Head -->
    <x-globals.head>

    </x-globals.head>

    <body>
    <!-- Header -->
    <x-globals.header>

    </x-globals.header>

    <form id="newCompanyForm" class="globalContainer form" method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
        @csrf
        <h3>Enter Company Details</h3>

        <label for="companyName">Company Name</label>
        <input id="companyName" type="text" name="companyName">
        <p class="companyNameError">Company name can't be blank</p>

        <label for="companyEmail">Company Email</label>
        <input id="companyEmail" type="text" name="companyEmail">
        <p class="emailError">please enter a valid email e.g example@email.com</p>

        <label for="companyWebsite">Company Website</label>
        <input id="companyWebsite" type="text" name="companyWebsite">
        <p class="companyWebsiteError">please enter a valid URL e.g reddit.com</p>

        <label for="companyLogo">Company Logo</label>
        <input id="companyLogo" type="file" name="companyLogo">
        <p class="companyLogoError">valid file types are jpeg, png, gif, svg</p>

        <button>create</button>

    </form>

    <script src="{{ asset('js/formValidation.js') }}" ></script>
    </body>
</html>
