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
        <div id="companyListingsContainer">
            <div id="companyListingsTopSection" class="globalContainer">
                <h2>Company Listings</h2>
                <a href="">List New Company</a>
            </div>

            @foreach($companies as $company)
                <div id="companyListingsBottomSection" class="globalContainer">
                    <div class="listingCardContainer">
                        <div class="listingCardLeftSection">
                            <img src="{{$company["company_picture"]}}" alt="Company Profile Picture">
                        </div>

                        <div class="listingCardMiddleSection">
                            <div class="middleTop">
                                <h4>{{$company["company_name"]}}</h4>
                                <p>Employee Count:</p>
                            </div>

                            <div class="middleBottom">
                                <p>Company Email: {{$company["company_email"]}}</p>
                                <p>Company Website: {{$company["company_website"]}}</p>
                            </div>
                        </div>

                        <div class="listingCardRightSection">
                            <a>edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </body>
</html>
