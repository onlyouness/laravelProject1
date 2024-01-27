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
                <li><i style="color:rgb(75, 75, 75);font-size:29px;display:block;width: 10px; height:12px" class="fa-solid fa-user"></i></li>
                <li><button>Sign in</button></li>
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