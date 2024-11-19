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

            <div id="companyListingsBottomSection" class="globalContainer">
                <div class="listingCardContainer">
                    <div class="listingCardLeftSection">
                        <img src="" alt="Company Profile Picture">
                    </div>

                    <div class="listingCardMiddleSection">
                        <div class="middleTop">
                            <h4>Company Title</h4>
                            <p>Employee Count:</p>
                        </div>

                        <div class="middleBottom">
                            <p>Company Email:</p>
                            <p>Company Website:</p>
                        </div>
                    </div>

                    <div class="listingCardRightSection">
                        <a>edit</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
