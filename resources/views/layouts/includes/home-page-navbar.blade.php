

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home_page.index') }}">
            <img src="{{ asset('images/logo.jpg')}}" alt="" width="30" height="24"
                class="d-inline-block align-text-top">
            DeveloperLima
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home_page.index') }}">Home</a>
                </li>
              
                    @php
                         $categories = App\Models\Category::where('navbar_status', '0')
                                ->where('status', '0')
                                ->get();
                    @endphp


                   @foreach ($categories as $category)
                   
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('home_page.view', ['slug' => $category->slug]) }}">{{ $category->name}}</a>
                   </li>
                   @endforeach


            </ul>

        </div>
    </div>
</nav>