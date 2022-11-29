<x-layout>
  @include ('posts._header') <!-- partial include like php-->

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
          @if ($posts->count()) <!--check if there are any posts in db-->
            <x-post-grid :posts="$posts" />

            {{ $posts->links() }} <!-- creates pagination links, works with paginate() in PostController.php -->


            @else <!-- Display message if no posts -->
              <p class="text-center">No posts yet. Check back later on</p>
            @endif
        </main>
</x-layout>
    