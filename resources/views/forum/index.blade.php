@extends('layouts.app')
@section('title','Forum')
@section('content')
<div class="container">
  <div class="jumbotron" id="tc_jumbotron">
    <div class="card-body" id="xx" style="color: #fff;     border:1px solid #fff;">
        <div class="text-center"> 
           <h1 style="    font-size: 3.5rem;">FORUM KAHMIPRENEUR</h1> 
        <p>Forum tanya jawab. Membantu, Mencari Solusi Dalam Mengembangkan Usaha</p>  
          </div>
        </div> 
      </div> 
    </div>  
        <div class="container"> 
            <div class="row">
              <div class="col-md-12" id="tc_container_wrap">
                <div class="card" id="tc_paneldefault"> 
                  <div class="card-body" id="tc_panelbody"  style="background: #f9f9f9;">  
                    <div class="row">
                      <div class="col-md-8" style="    padding-right: 0;"><br>
                      <table class="table table-bordered">
                      <thead id="tc_thead">
                        <tr>
                          <th scope="col">Thread</th>
                          <th scope="col">Comments</th>
                          <th scope="col">Views</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                        <tbody style="background: #f9f9f9;">

                          @foreach($forums as $forum)
                          <tr> 
                            <td width="453">

                                @foreach($forum->tags as $tag)
                              <div class="forum_title">
                                <h4><a href="{{route('forumslug', $forum->slug)}}">{{str_limit($forum->title, 40)}}</a></h4>
                                  <p>{!!str_limit($forum->description, 50)!!}</p>
                                  <a href="#" class="badge badge-success tag_label">{{$tag->name}}</a>
                                @endforeach
                                @if(empty($forum->image))
                                @else
                                  <div class="badge badge-success tag_label_image"><i class="fa fa-image"></i></div>
                                @endif
                              </div>

                            </td>
                            <td  style="text-align: center"><small>{{$forum->comments_count}}</small></td>
                            <td  style="text-align: center"><small> 2</small></td>
                            <td>

                              <div class="forum_by">
                                <small style="margin-bottom: 0; color: #666">{{ date('j F Y', strtotime($forum->created_at)) }}</small>
                                <small>by <a href="#">{{ Auth::user()->name }}</a></small>
                              </div>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                 <!-- pagination -->
                      <div class="row justify-content-center">
                      {!! $forums->links() !!}
                      </div>
                      </div>
                        <div class="col-md-4"> <br>
                          <div class="card">
                            <div class="card-header" style="background: #2ab27b; color: #fff; padding: 8px 1.25rem;">Popular</div>
                              <div class="list-group">
                               <a href="#" class="list-group-item" id="index_hover">What is Lorem Ipsum?
                               <a href="#" class="list-group-item" id="index_hover">Where does it come from?</a> 
                              </div>
                          </div>
                        </div>
                    </div>
                <hr style="margin-top: 0;"> 
                <div class="card">
                  <div class="card-header"></div>
                    <div class="card-body" style="background: rgb(90, 90, 90)"></div>
                      <div class="card-header"></div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div><br><br>
@endsection
 