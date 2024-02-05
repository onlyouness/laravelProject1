<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{asset("css/dash.scss")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css ">

</head>
<body>
    <div class="nav_container">
        <nav>
            <h3 class="logo">Shop</h3>
            <ul class="navSection">
                <li><a href="/home">Home</a></li>
                <li><a href="/">Dashboard</a></li>

                <li><a href="/category">Category</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <ul class="userSection"> 
                @if($user)
                <div class="dropdown">
                    
                    <li class="dropIcon">
                        <div> 
                            <img class="img-profile" src="{{asset('/storage/images/profiles/'.$user->image)}}" alt="img">
                        </div>
                    </li>
                    <div class="dropdown-content">
                       
                            <h3>Welcome, {{ $user->username }}</h3>
                            <p><span class="userEmail">Email:</span> {{ $user->email }}</p>
                            <button class="editbtn" onclick="location.href='/editUser'"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button>
                            <button onclick="location.href='/logout'"><i class="fa fa-sign-out"></i>&nbsp;Log Out</button>
                        


                         </div>
                         </div>
        @else
                <div class="dropdown">
                        <li class="dropIcon btnLog"><button onclick="location.href='/login'" id="loginBtn">Log In </button></li>
                       
                       
                   
                </div>
                <li><button><a href="/register">Sign up</a></button></li>
             @endif
            </ul>
        </nav>
    </div>

    <div class="homeContainer">

        <div class="items"> 
        @foreach($products as $product)
            <div class="item_list">
                <div class="imageContainer">

                    <img src="{{asset('/storage/images/products/'.$product->image)}}" alt="img">
                </div>
                <div class="info">

                
                <h2>{{$product->title}}</h2>
                @foreach($categories as $category)
                <p>{{$product->categoryId == $category->id ? $category->categoryTitle: ""}}</p>
                @endforeach
                
                <div class="panel_section">
                    <h5>{{$product->price}}$</h5>
                    <button><i class="fa-solid fa-cart-shopping" style=" display:block; font-size:25px; width:40px;height:40px"></i></button>
                </div></div>
            </div>
        @endforeach
      </div>
    </div>
</body>
</html>