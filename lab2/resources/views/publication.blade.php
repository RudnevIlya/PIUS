<!DOCTYPE html>
<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    </head>
    <body>
    <form method="GET" >
            <p>Фильтр по коду</p>
            <input type="text" id="tokenFilter" name="codeFilter"></input>
            <p>Фильтр по названию</p>
            <input type="text" id="titleFilter" name="titleFilter"></input>
            <p>Фильтр по тегу</p>
            <input type="text" id="tagFilter" name="tagFilter"></input>
            <input type="submit"></input>
        </form>


    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1" >
                    <p>Идентификатор</p>
                </div>
                <div class="col-sm-2">
                    <p>Название</p>
                </div>
                <div class="col-sm-2">
                    <p>Код</p>
                </div>
                <div class="col-sm-3">
                    <p>Содержание</p>
                </div>
                <div class="col-sm-2">
                    <p>Дата создания</p>
                </div>
                <div class="col-sm">
                    <p>Автор</p>
                </div>
            </div>
            @foreach($publications as $p)
                <div class="row">
                    <div class="col-sm-1" >
                        <p>{{ $p->id }}</p>
                    </div>
                    <div class="col-sm-2">
                        <p>{{ $p->title }}</p>
                    </div>
                    <div class="col-sm-2">
                        <p>{{ $p->token }}</p>
                    </div>
                    <div class="col-sm-3">
                        <p>{{ $p->content }}</p>
                    </div>
                    <div class="col-sm-2">
                        <p>{{ $p->created_at }}</p>
                    </div>
                    <div class="col-sm">
                        <p>{{ $p->author }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $publications->links('pagination::bootstrap-4') }}
    </body>
</html>