
<div class="mv-user-review-item">
    <div class="user-infor">
        @if($comment->user->user_image)
        <img src="{{ asset('users/' . $comment->user->user_image) }}" alt="">
        @else
        <img src="{{ asset('img/user.png') }}" alt="">
        @endif 	
        <div>
            <h3>{{ $comment->user->name }}</h3>
            <p class="time">
                {{$comment->created_at}} 
            </p>
        </div>
    </div>
    <p style="word-wrap: break-word;">  {{$comment->body}}</p>
</div>