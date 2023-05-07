<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - Listes</title>
    <style>
        body {
            background: white;
        }
    </style>
</head>

<body>
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="mt-5">Liste des articles</h1>
                <a href="{{ route('articles.create') }}" class="btn btn-primary my-3">Ajouter un nouvel article</a>
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="image-project/updload-backoffice/{{$article->image}}" style="height: 100%;" class="img-fluid rounded-start" alt="{{ $article->resume }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->titre }}</h5>
                                        <p class="card-text">{{ $article->resume }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div style="float: right;">
                                        <!-- <a href="{{ route('articles.show', ['article'=>$article->id,'categorie'=> $article->url]) }}" class="btn btn-info">Afficher</a> -->
                                        <a href="{{ route('articles.edit', ['article'=>$article->id]) }}" class="btn btn-warning">Modifier</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- <table class="table">
                    
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td>
                                <img src="image-project/updload-backoffice/{{$article->image}}" alt="">
                            </td>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->titre }}</td>
                            <td>{{ $article->resume }}</td>
                            <td class="text-center">
                                <a href="{{ route('articles.show', ['article'=>$article->id,'categorie'=> $article->url]) }}" class="btn btn-info">Afficher</a>
                                <a href="{{ route('articles.edit', ['article'=>$article->id]) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> -->
            </div>
        </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>