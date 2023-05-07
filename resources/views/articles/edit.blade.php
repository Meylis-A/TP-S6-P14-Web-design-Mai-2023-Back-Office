<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - Modifier</title>
    <style>
        body {
            background: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h1 class="mt-3">Modifier l'article : {{ $article->titre }}</h1>
                <a href="{{route('blog-post')}}" class="btn btn-primary my-3">Retour</a>
                <form action="{{ route('update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="titre" id="title" class="form-control" value="{{ $article->titre }}">
                    </div>
                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input type="text" name="resume" id="resume" class="form-control" value="{{ $article->resume }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image couverture</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{ $article->categorie }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Contenu</label>
                        <textarea name="contenu" id="contains" cols="30" rows="10" class="form-control">{{ $article->contenu }}</textarea>
                        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                        <script>
                            CKEDITOR.replace('contains');
                        </script>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>