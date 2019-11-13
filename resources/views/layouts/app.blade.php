<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Larashop @yield("title")</title>
<link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
<link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconicbootstrap.min.css')}}">
<style>
.grid-highlight {
padding-top: 1rem;
padding-bottom: 1rem;
background-color: #5c6ac4;
border: 1px solid #202e78;
color: #fff;
}
hr {
margin: 6rem 0;
}
hr+.display-3,
hr+.display-2+.display-3 {
margin-bottom: 2rem;
}
</style>
<script type="text/javascript">
document.documentElement.className =
document.documentElement.className.replace('no-js', 'js') +
(document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
</script>
</head>
    <body>
        <nav class="navbar navbar-expand p-0">
            <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="/home"> Larashop </a>
                <button class="btn btn-link d-block d-md-none" datatoggle="collapse" data-target="#sidebar-nav" role="button" >
                    <span class="oi oi-menu"></span>
                </button>
                <input class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2" type="text" placeholder="Search" arialabel="Search">
            <div class="dropdown d-none d-md-block">
                @if(\Auth::user())
                <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                {{Auth::user()->name}}
                </button>
                @endif
                <div class="dropdown-menu dropdown-menu-right" id="navbardropdown">
                    <a href="#" class="dropdown-item"><span class="oi oi-person"></span> Profile</a>
                    <a href="#" class="dropdown-item"><span class="oi oi-wrench"></span> Setting</a>
                        <div class="dropdown-divider"></div>
                        <li>
                        <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <button class="dropdown-item" style="cursor:pointer"><span class="oi oi-account-logout"></span> Sign Out</button>
                        </form>
                    </li>
                </div>
            </div>
        </nav>
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-itemsstretch m-0">
        <div class="col-lg-12 col-md-12 p-4">
        @yield("content")
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>