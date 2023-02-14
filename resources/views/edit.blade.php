<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Form</title>
    <style>
        thead{
            border-bottom: 2px solid black;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 align="center">Form</h2>
            <form action="{{ route('form.update',$form->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Name</label>
            <input type="text" placeholder="Enter Your Name" name="name" class="form-control" value="{{ $form->name }}">
            <span class="text-danger">
                @error('name')    
                {{ $message }}                
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Father Name</label>
            <input type="text" placeholder="Enter Your Father's Name" name="father_name" class="form-control" value="{{ $form->father_name }}">
            <span class="text-danger">
                @error('father_name') 
                {{ $message }}                      
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Email</label>
            <input type="email" placeholder="Enter Your Email" name="email" class="form-control" value="{{ $form->email }}">
            <span class="text-danger">
                @error('email')      
                {{ $message }}                 
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Current Cv</label>
            <img src="{{ asset('storage/'.$form->image) }}" alt="" width="150px"><br>
            <label for="">Cv</label>
            <input type="file" name="image" class="form-control">
             <span class="text-danger">
                @error('image')      
                  {{ $message }}                 
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
                <label for="">Phone</label>
                <input type="number" placeholder="Enter Your Phone" name="phone" class="form-control" value="{{ $form->phone }}">
                <span class="text-danger">
                    @error('phone')   
                    {{ $message }}                    
                    @enderror
                </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3 mt-3">                
            <input type="submit" class="form-control btn btn-warning">
            </div>
        </div>
    </div>
    </form>   
</body>
</html>