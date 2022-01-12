<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item active">
                    <a class="nav-link"
                     href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} </a>
                    </li>
                @endforeach
                {{-- <span class="sr-only">(current)</span> --}}
                
              </ul>
              {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form> --}}
            </div>
          </nav>
        
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                   {{__('messages.Add Your Offer')}}
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{route('offers.store')}}" method="post">
                    @csrf
                    {{-- <input  name="_token" value="{{csrf_token()}}"> --}}
                    <div class="form-group">
                        <label for=""> {{__('messages.Offer Name ar')}}</label>
                        <input type="text" class="form-control" name="name_ar"  placeholder="{{__('messages.Offer Name ar')}}">
                        @error('name_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for=""> {{__('messages.Offer Name en')}}</label>
                        <input type="text" class="form-control" name="name_en"  placeholder="{{__('messages.Offer Name en')}}">
                        @error('name_en')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="">{{__('messages.Offer Price')}}</label>
                        <input type="text" class="form-control" name="price"  placeholder="{{__('messages.Offer Price')}}"> 
                        @error('price')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{__('messages.Offer Details ar')}}</label>
                        <input type="text" class="form-control" name="details_ar"  placeholder="{{__('messages.Offer Details ar')}}">
                        @error('details_ar')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{__('messages.Offer Details en')}}</label>
                        <input type="text" class="form-control" name="details_en"  placeholder="{{__('messages.Offer Details en')}}">
                        @error('details_en')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{__('messages.Save Offer')}}</button>
                </form>
                

                
            </div>
        </div>
    </body>
</html>
