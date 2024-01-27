<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dash.scss') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css ">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>DashBoard</title>
  
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

    <main>
        <div class="header">
            <p>Products</p>
            <button class="btn btn-primary mb-3"><a href="/showAddProduct">Add Product</a></button>
        </div>
        <div class="productsList">
            <table>
                <thead style="padding:2rem;background-color: rgb(243, 240, 240)">
                    <tr style=" ">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr id={{ $product->id }}>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->categoryId}}</td>
                        {{-- <img src="/storage/images/products/tv.jpg" alt="image"/> --}}
                        <td><img src="{{asset('/storage/images/products/'.$product->image)}}" alt="image" /></td>
                        <td class="btn_container"><button class="btn btn-primary mb-3"><a href="/edit-product/{{$product->id}}">Edit</a></button>
                            <form action="/delete-product/{{$product->id}}" method="post">
                                @csrf 
                                @method("DELETE")
                                <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger mb-3">Delete</button></form></td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
        
        
    </main>
    


    
</body>
</html>