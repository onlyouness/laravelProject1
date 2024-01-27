<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Edit Product</title>
</head>
<body>
    <div class="container mt-5" >
        <h3>Edit Product</h3>
       <form action="/EditProduct/{{$product->id}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method("PUT")
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Title</label>
               <input name="titleEdited"type="text" class="form-control" value="{{$product->title}}" id="exampleFormControlInput1" placeholder="Phone ect....">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput2" class="form-label">Price</label>
               <input name="priceEdited" type="text" value="{{$product->price}}" class="form-control" id="exampleFormControlInput2" placeholder="Enter the price">
           </div>
           <div class="form-floating">
               <select name="categoryIdEdited" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                   @foreach($categories as $category)
                   
               <option value="{{$category["id"]}}" {{$product->categoryId == $category->id ? 'selected' : ''}}>{{$category->categoryTitle}}</option>
               <option value="{{$category["id"]}}">{{$category['categoryTitle']}}</option>
               @endforeach
               </select>
               <label for="floatingSelect">Category</label>
           </div>
          
           <div class="mb-3 mt-3">
               <label for="formFile" class="form-label">Select The Image Again</label>
               <input value="{{$product->image}}" name="imageEdited" class="form-control" type="file" id="formFile">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>

   </form>
   </div>
    
</body>
</html>