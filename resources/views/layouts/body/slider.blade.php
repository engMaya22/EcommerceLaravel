@php
$sliders=DB::table('sliders')->get();
@endphp


<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">
       

       @foreach($sliders as $key => $item)
        <!-- Slide 1 -->
        <div class="carousel-item {{ $key==0 ? 'active' : ''}}" style="background-image: url({{asset($item->image)}}");>
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{$item->title}}</h2>
              <p>{{$item->description}}</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
             
            </div>
          </div>
          </div>
        @endforeach

       <div>
      
</div>
  </section><!-- End Hero -->