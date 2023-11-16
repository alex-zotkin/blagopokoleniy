<link rel="stylesheet" href="{{asset('css/news_block.css')}}">

@extends("../layouts/index-layout")

@section('title', 'Главная // Благополучие поколений')



@section('content')

<section class="main_img_block">
        <div class="main_img"></div>
    </section>

<section class="title transparent">
        <h1>Новости</h1>
    </section >

    <section class="news_block">    
        <div class="news">
        
        @foreach ($posts as $post)

        
                <a href="{{route('article', $post['id'])}}">
                <div class="article">
                    <div class="article_top" style="background-image: url('{{URL::to('/')}}/public/imgs/news/{{$post['imgName']}}');"></div>
            
            
                    <div class="article_bottom">
                        <div class="link_text">
                            <h3>{{$post['title']}}</h3>
                        </div>
                    </div>

                        <div class="author">
                            <!-- <div class="autor_img" style="background-image: url('https://scontent-arn2-1.cdninstagram.com/vp/a22bc6784f9d3024eff05063424e77a2/5C13E370/t51.2885-15/sh0.08/e35/s640x640/37420620_246930362698613_2942454971771125760_n.jpg');"></div> -->
                            <div class="author_text">
                                <h2 class="author_title">Опубликовано:</h2>
                                <h2 class="author_name">{{$post['created_at']->day}} / {{$post['created_at']->month}} / {{$post['created_at']->year}}</h2>
                            </div>
                            </div>
                        </div>
                    
                </a>
                

        @endforeach
                
               

            
                
                

    
            

                
            
            
        </div>
        <a href="{{route('articles')}}" class="button">Все новости</a>
    </section>

@stop