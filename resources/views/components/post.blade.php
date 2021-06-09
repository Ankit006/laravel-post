@props(['post'=>$post]);


<div class="mb-4">
    <a href="{{route('users.posts',$post->user)}}" class="font-bold">{{$post->user->username}} <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span></a>
    <p class="mb-2">{{$post->body}}</p>
    <div class="flex item-center">
        @if (!$post->likesBy(auth()->user()))
        <form action="{{route('postsLike',$post->id)}}" method="POST" class="mr-1">
         @csrf
         <button type="submit" class="text-blue-500">Like</button>
     </form>
      @else
      <form action="{{route('postsLike',$post->id)}}" method="POST" class="mr-1">
         @csrf
         @method('DELETE')
         <button type="submit" class="text-blue-500">Unlike</button>
     </form>
        @endif

        @can('delete', $post)
        <form action="{{route('posts.destroy',$post)}}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="text-blue-500">Delete</button>
     </form>

        @endcan
        <span>{{$post->likes->count()}} {{Str::plural('likes',$post->likes->count())}}</span>
    </div>
</div>