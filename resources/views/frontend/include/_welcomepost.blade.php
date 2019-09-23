<!-- Single Slide -->
@foreach ($posts as $post)
<div class="welcome-single-slide">
    <!-- Post Thumb -->
    <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
        <img src="{{ asset($post->featured) }}" alt="" height="330" style="background-size: cover;">
    </a>
    <!-- Overlay Text -->
    <div class="project_title">
        <div class="post-date-commnents d-flex">
            @php $date = $post->created_at; $date = date( "F j, Y", strtotime($date));@endphp
            <a href="#">{{ $date }}</a>
            <a href="#">5 Comment</a>
        </div>
        <a href="{{ url( $post->categorie->slug . '/' . $post->slug) }}">
            <h5>{{ $post->title }}</h5>
        </a>
    </div>
</div>
@endforeach
