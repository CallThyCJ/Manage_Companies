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
                @if(Auth::check() && Auth::user()->admin)
                    <h2>Company Listings</h2>
                    <a href="{{url('/list_new_company')}}">List New Company</a>
                @endif
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
                            @if(Auth::check() && Auth::user()->admin)
                            <a href="{{url('/' . $company["id"])}}">edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    <div class="laravelPagination globalContainer">
        {{$companies->links()}}
    </div>

    </body>
</html>
