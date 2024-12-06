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
        <x-globals.navbar :action="route('Companies')">

        </x-globals.navbar>

    <!-- company listing -->
        <div id="companyListingsContainer">
            <div id="companyListingsTopSection" class="globalContainer">
                    <h2>Company Listings</h2>
                @if(Auth::check() && Auth::user()->admin)
                    <a href="{{url('/list_new_company')}}">List New Company</a>
                @endif
            </div>

            @if(request('search'))
{{--                <p>Search results for "{{ request('search') }}":</p>--}}
            @endif

            @forelse($companies as $company)
            <div id="companyListingsBottomSection" class="globalContainer">
                    <div class="listingCardContainer">
                        <div class="listingCardLeftSection">
                            <img src="{{$company["company_picture"] ?? asset('default_images/default_company_picture.png')}}" alt="Company Profile Picture" loading="lazy">
                        </div>

                        <div class="listingCardMiddleSection">
                            <div class="middleTop">
                                <h4>{{$company["company_name"]}}</h4>
                                <p>Employee Count: {{$company->employees_count}}</p>
                            </div>

                            <div class="middleBottom">
                                <div class="middleBottomEmail">
                                    <p>Company Email: </p>
                                    <p>{{$company["company_email"]}}</p>
                                </div>
                                <div class="middleBottomWebsite">
                                    <p>Company Website: </p>
                                    <a href="{{$company['company_website']}}" target="_blank" rel="noopener">
                                        {{ parse_url($company['company_website'], PHP_URL_HOST) ?? $company['company_website'] }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="listingCardRightSection">
                            @if(Auth::check() && Auth::user()->admin)
                            <a href="{{url('/' . $company["id"])}}">edit</a>
                            @endif
                        </div>
                    </div>
                </div>

            @empty
                <p>No companies found.</p>
            @endforelse
        </div>

    <div class="laravelPagination globalContainer">
        {{$companies->links()}}
    </div>

    </body>
</html>
