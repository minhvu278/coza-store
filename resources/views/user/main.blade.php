<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.head')
</head>
<body>

<!-- Header -->
@include('user.header')

@include('user.cart')

@yield('content')

@include('user.footer')

</body>
</html>
