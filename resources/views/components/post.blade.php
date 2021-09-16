{{-- <div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div> --}}

@props(['post'=>$post])

<div class = "mb-4">
                        <a href="{{ route('user.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a>
                        <span class="text-gray-600 text-sm">{{$post->created_at->diffForhumans()}}</span>
                        <p class="mb-2">{{$post->body}}</p>

                        {{-- @if ($post->ownedBy(auth()->user())) --}}
                            @can('delete', $post)
                            
                            <form action="{{ route('posts.destroy', $post)}}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        {{-- @endif --}}
                        @endcan

                        <div class="flex items-center">
                            @auth
                            @if (!$post->likedBy(auth()->user()))    
                                <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post)}}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button>
                                </form>
                            @endif

                            @endauth
                            <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
                        </div>
                    </div>