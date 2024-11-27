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

<a href="{{url('/' . $company['id'])}}" id="companyProfileLink">Company Profile</a>

<div class="globalContainer">
    <form id="editCompanyForm" class="form" method="POST" action="{{ route('company.update', ['id' => $company['id']]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <button form="companyDeleteForm" class="deleteButton">Delete</button>

        <div id="editCompanyTitle">
            <h3>Update {{$company["company_name"]}} Details</h3>
            <img src="{{$company["company_picture"]}}" alt="companyLogo">
        </div>

        <label for="editCompanyName">Company Name</label>
        <input id="editCompanyName" type="text" name="editCompanyName" value="{{$company["company_name"]}}">

        <label for="editCompanyEmail">Company Email</label>
        <input id="editCompanyEmail" type="text" name="editCompanyEmail" value="{{$company["company_email"]}}">

        <label for="editCompanyWebsite">Company Website</label>
        <input id="editCompanyWebsite" type="text" name="editCompanyWebsite" value="{{$company["company_website"]}}">

        <label for="editCompanyLogo">Company Logo</label>
        <input id="editCompanyLogo" type="file" name="editCompanyLogo">

        <button type="submit">confirm</button>

    </form>

    <form method="POST" action="{{ route('company.destroy', ['id' => $company['id']]) }}" id="companyDeleteForm" class="deleteForm">
        @csrf
        @method("DELETE")
    </form>
</div>

<script src="{{ asset('js/formValidation.js') }}" ></script>
</body>
</html>
