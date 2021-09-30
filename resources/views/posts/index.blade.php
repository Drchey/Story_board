<x-app-layout>
    <x-hero></x-hero>
    <div class="container px-5 py-12 mx-auto">
        <div class="mb-12">
            <div class="flex-justify-center">
                @foreach ($tags as $tag)
                    <a href="{{route('posts.index',['tag'=>$tag->slug])}}" class="
                        {{$tag->slug === request()->get('tag')?'bg-gray-500': ''}}
                        inline-block ml-12 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-red-900 lowercase">
                        {{$tag->name}}
                    </a>
                @endforeach
            </div>
            <div class="mb-12 mt-5">
                <h2 class="text-2xl font-medium text-gray-700 title-font px-4">
                    Stories for You ({{$posts->count()}})
                </h2>
            </div>
            <div class="-my-6">
                @foreach ($posts as $post)
                    <a href="{{route('posts.show', $post->slug)}}" class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 hover:bg-gray-100 ">
                        <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex-col">
                            <img src="#" alt="" logo
                            class="w-16 h-16 rounded-full object-cover">
                        </div>
                        <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                        <h2 class="text-xl font-bold text-gray-800 title-font mb-1">
                            {{$post->title}}
                        </h2>
                        <p class="leadig-relaxed text-gray-900">

                        </p>
                    </div>
                    <div class="md:flex-grow mr-8 flex items-center justify-start">
                        @foreach ($post->tags as $tag)
                            <span
                            class=" inline-block ml-12 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-red-900 lowercase">
                            {{$tag->name}}
                        </span>
                        @endforeach
                    </div>
                    <span class="md:flex-grow flex items-center justify-end">
                        <span>
                            {{$post->created_at->diffForHumans()}}
                        </span>
                    </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
